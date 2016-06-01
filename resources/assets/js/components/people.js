Vue.component('people', {

    data(){
        return {
            leads: false,
            next_page: false,
            loading_icon: 'wb-plus',
            loading_disable: '',
            loading_label: 'Load  More'
        }
    },

    created() {
        this.$http({
            url: '/api/lead',
            method: 'GET'
        }).then((response) => {
            this.leads = response.data.data;
            console.log(response.data);
            this.next_page = (response.data.next_page_url) ? response.data.next_page_url : false;
        }).bind(this);
    },

    methods: {
        show(lead){
            window.location = '/visitors/' + lead
        },
        paginate(){
            this.loading_icon = 'wb-loop';
            this.loading_disable = 'disabled';
            this.loading_label = 'Loading...';
            this.$http({
                url: this.next_page,
                method: 'GET'
            }).then((response) => {
                for (var i = 0; i < response.data.data.length; i++) {
                    this.leads.push(response.data.data[i]);
                }
                this.next_page = (response.data.next_page_url) ? response.data.next_page_url : false;
                this.loading_icon = 'wb-plus';
                this.loading_disable = '';
                this.loading_label = 'Load More';
            }).bind(this);
        }
    }

});
