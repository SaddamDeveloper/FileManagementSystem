
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform'
import VueRouter from 'vue-router'
import VueProgressBar from 'vue-progressbar'
import Swal from 'sweetalert2'
import Multiselect from 'vue-multiselect'



Vue.component('multiselect', Multiselect)

window.Multiselect = Multiselect;
// import { Printd } from 'printd'

window.Swal = Swal;
// const d = new Printd()
// window.d = d;
const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });


window.Fire = new Vue();

import vSelect from 'vue-select'
Vue.component('v-select', vSelect)
window.toast = toast;
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
  })

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.use(VueRouter)

let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/registercase', component: require('./components/Register.vue').default },
    { path: '/admindashboard', component: require('./components/Admindashboard.vue').default },
    { path: '/adminregistercase', component: require('./components/Adminregister.vue').default },
    { path: '/managerdashboard', component: require('./components/ManagerDashboard.vue').default },
    { path: '/employee', component: require('./components/Employee.vue').default },
    { path: '/gst', component: require('./components/Gst.vue').default },
    { path: '/worktype', component: require('./components/Worktype.vue').default },
    { path: '/client', component: require('./components/Client.vue').default },
    { path: '/managerregister', component: require('./components/ManagerRegister.vue').default },
    { path: '/registeredcase', component: require('./components/RegisteredCase.vue').default },
    { path: '/newcase', component: require('./components/NewCase.vue').default },
    { path: '/assignedcase', component: require('./components/AssignedCase.vue').default },
    { path: '/employeedashboard', component: require('./components/Employeedashboard.vue').default },
    { path: '/employeeassignedcase', component: require('./components/EmployeeAssignedCase.vue').default },
    { path: '/forapprovalcase', component: require('./components/ForApprovalCase.vue').default },
    { path: '/completedcase', component: require('./components/CompletedCase.vue').default },
    { path: '/rejectedcase', component: require('./components/RejectedCase.vue').default },
    { path: '/waitingforapproavalcase', component: require('./components/WaitingForApprovalCase.vue').default },
    { path: '/billingcase', component: require('./components/BillingCase.vue').default },
  ]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
