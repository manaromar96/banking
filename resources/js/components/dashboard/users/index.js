Vue.component('admins-index', {
    data() {
        return {
            data: [],

        }
    },
    mounted() {

        this.$on('userDeleted', id => {
            this.$refs.table.refresh();
        });


    },
    methods: {
        async fetchData({ page, filter, sort }) {
            const response = await axios.get('/dashboard/users/data', {params: { page, filter, sort }});
            return {
                data: response.data.users.data,
                pagination: {
                    currentPage: response.data.users.current_page,
                    totalPages: response.data.users.last_page
                }
            };
        },

        whenFormSuccess(response) {
            this.$refs.table.refresh();
        }
    },

})
