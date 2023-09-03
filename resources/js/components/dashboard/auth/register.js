Vue.component('user-register', {



    data() {
        return {
            name: null,
            email: null,
            password: null,
            accounts:[],
        }
    },

    mounted() {


    },

    methods: {
        save() {
            let url= '/register';
            let method = 'POST';

            this.saveForm(url, method, '/dashboard/users', {
                name: this.name,
                email: this.email,
                password: this.password,
                account:this.account,


            });
        },

    },

    computed: {

    },

    components: {

    }
});
