import moment from 'moment';
import Vue from 'vue'
Vue.filter('timeformate',(arg)=>{
    return moment(arg).format("DD-MMM-YYYY hh:mm:ss a")
});

