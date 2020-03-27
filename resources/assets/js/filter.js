import moment from 'moment';
import Vue from 'vue'
Vue.filter('timeformate',(arg)=>{
    return moment(arg).format("DD-MMM-YYYY hh:mm:ss a")
});

Vue.filter('capitalize',function (value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
})

