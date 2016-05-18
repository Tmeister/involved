Vue.component('people', {

    data(){
      return {
          leads: {},
          lead: false,
          hits: {}
      }
    },

    created() {
        this.$http({
            url: '/api/lead',
            method: 'GET'
        }).then((response) => {
            this.leads = response.data;
        }).bind(this);
    },

    methods: {
        show(lead){
            this.lead = lead;
            this.$http({
                url: 'api/lead/' + lead.public_id,
                method: 'GET'
            }).then((response) => {
                if(response.status == 200) {
                    this.hits = response.data;
                }
            }).bind(this);
        }
    }

});
