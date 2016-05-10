Vue.component('home', {
    props: ['user'],

    ready() {

        this.$http.get('api/test')
            .then( response => {
                console.log(response.data);
            });
    }
});
