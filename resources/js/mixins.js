export default {
    data() {
        return {
            requestForm: {
                error: false,
                validations: [],
            },
            CURRENT_USER: CURRENT_USER,
            BASE_URL: BASE_URL,
            validation_message: '',
            disabledButtons: false,
            SWALSuccess: true,
        }
    },

    methods: {
        deleteItem(id, url, event=null) {
            swal.fire({
                title: ('هل أنت متأكد'),
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: __('حذف'),
                cancelButtonText: __('الغاء'),
            }).then((result) => {
                if (result.value) {
                    axios.delete(url).then(response => {
                        if(event != null) {
                            this.$emit(event, id);
                        }
                        swal({
                            title: response.data.message,
                            timer: 2000,
                        });
                    })
                }
            })
        },

        saveForm(url, method, redirect = null, data = {}) {
            this.disabledButtons = true;
            this.requestForm.validations = [];
            this.showLoading();
            let returned_data = null;
            axios({ method: method, url: url, data})
                .then(response => {
                    this.hideLoading();
                    this.$emit('formSaved', response.data);
                    if(this.SWALSuccess) {
                        this.notify_success(response.data.message);
                    }

                    setTimeout(() => {
                        if (redirect !== null) {
                            window.location.href = BASE_URL + redirect
                        } else {
                            this.requestForm.disabled = false;
                        }
                    }, 2000);
                    this.requestForm.validations = [];
                    this.disabledButtons = false;
                    this.whenFormSuccess(response); // new


                    returned_data = response;
                })
                .catch(error => {
                    this.handleError(error);
                });

            return returned_data;
        },


        handleError(error) {
            this.hideLoading();
            this.disabledButtons = false;
            if (error.response.data.errors) {
                this.requestForm.validations = error.response.data.errors;
            } else if (error.response.data.error_message) {
                this.requestForm.validations = [];
                this.validation_message = error.response.data.error_message;
                this.notify_error(error.response.data.error_message, 4000);
            } else if (error.response.data.message_error) {
                this.notify_error(error.response.data.message_error, 4000);
            }

            if(this.SWALError) {
                var period_time = 4000;
                if(typeof(error) == 'string') {
                    this.notify_error(error, period_time);
                } else {
                    this.notify_error(this.convertCustomErrorObjectForSwalToString(error.response.message), period_time);
                }

            }

            document.body.scrollTop = 0; // For Chrome, Safari and Opera
            document.documentElement.scrollTop = 0; // For IE and Firefox
        },

        whenFormSuccess(response = null) {

        },

        convertCustomErrorObjectForSwalToString(response) {
            var returned_string = '';
            if (response.message != undefined && response.errors != undefined) // custom error from helpers
            {
                if (response.errors instanceof Object) {
                    $.each(response.errors, function (index, message) { // response is number of errors
                        returned_string = returned_string + message + "<br>";
                    });
                } else { // response is single text message
                    returned_string = response.message ? response.message : response.error_message + "<br>";
                }
            } else if (response.error.data.error_message != undefined) // custom error from helpers
            {
                returned_string = response.error.data.error_message;
            } else { // laravel error
                $.each(response, function (index, message) {
                    returned_string = returned_string + message + "<br>";
                });
            }

            return returned_string;
        },

        getDateFormat(date, format = "DD-MM-YYYY") {
            return moment(date).format(format);
        },

        getDiffForHuman(date) {
            return this.$moment(date).lang('ar').fromNow();
        },

        showLoading() {
            $('#loading-div').show();
        },

        hideLoading() {
            $('#loading-div').hide();
        },


        notify_error(message, duration = 3000) {
            this.$message({
                showClose: true,
                duration: duration,
                message: message,
                type: 'error'
            });
        },

        notify_success(message, duration = 4000) {
            this.$message({
                showClose: true,
                duration: duration,
                message: message,
                type: 'success'
            });
        },

        deleteObject(url, name = null) {
            swal.fire({
                title: __('هل انت متأكد من الحذف') + __('?'),
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: __('Yes'),
                cancelButtonText: __('No'),
            }).then((result) => {
                if(result.value) {
                    this.showLoading();
                    axios.delete(url).then(response => {
                        this.hideLoading();
                        if(this.$refs.table) {
                            this.$refs.table.refresh();
                        } else {
                            window.location.reload();
                        }
                        swal.fire(
                            __('Deleted Successfully'),
                            '',
                            'success'
                        )
                    }).catch(error => {
                        this.hideLoading();
                        console.log(error)
                        swalError(error);
                    });
                }
            })
        },
    },

    computed: {

    }
}
