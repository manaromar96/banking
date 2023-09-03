Vue.component('admins-form', {

    props: {
        user: Object,
    },

    data() {
        return {
            name: null,
            email: null,
            password: null,
        }
    },

    mounted() {
        if(this.user) {
            this.name = this.user.name;
            this.email = this.user.email;

        }

    },

    methods: {
        save() {
            let url = this.user ? `/dashboard/users/${this.user.id}` : '/dashboard/users';
            let method = this.user ? 'PUT' : 'POST';

            this.saveForm(url, method, '/dashboard/users', {
                name: this.name,
                email: this.email,
                password: this.password,
            });
        },

    },

    computed: {

    },

    components: {

    }
});
