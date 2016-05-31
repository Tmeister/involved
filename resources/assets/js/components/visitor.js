Vue.component('visitor', {

    data(){
        return {
            lead: false,
            hits: {}
        }
    },

    created() {
        console.log(window.visitor);
        this.$http({
            url: '/api/lead/' + window.visitor.id,
            method: 'GET'
        }).then((response) => {
            console.log(response.data.lead.first_hit.created_at);
            this.lead = response.data.lead;
            this.hits = response.data.hits;
        }).bind(this);

    },

    methods: {
        // show(lead){
        //     window.location = '/visitors/' + lead
        // }
    }

});
