Vue.component('people', {

    data(){
      return {
          leads: false,
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
            window.location = '/visitors/' + lead
        }
    }

});
