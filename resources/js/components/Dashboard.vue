<template>
  <div class="container-fluid">
<search v-if="this.searchResult"></search>
    <div class="row" v-if="!this.searchResult">
      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
          <div class="card-body pb-0">
            <h4 class="mb-0">
              <span class="count" v-if="users.selected == 0">{{ NewRegistered }}</span>
              <span class="count" v-else-if="users.selected == 1">{{ NewRegistered }}</span>
              <span class="count" v-else>{{ newRegisteredEmp }}</span>
            </h4>
            <router-link to="/registeredcase"  v-if="users.selected == 0"><p class="text-light">Register New Case</p></router-link>
            <router-link to="/newcase" v-else-if="users.selected == 1"><p class="text-light">Newly Registered Case</p></router-link>
            <router-link to="/employeeassignedcase" v-else><p class="text-light">New Case</p></router-link>

           <img src="sufeeadmin/images/canvas.png" alt="">

        </div>

      </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-flat-color-2">
        <div class="card-body pb-0">
          <h4 class="mb-0">
            <span class="count" v-if="users.selected == 0">{{ assignedcase }}</span>
            <span class="count" v-else-if="users.selected == 1">{{ assignedcase }}</span>
            <span class="count" v-else>{{ approvedCaseEmp }}</span>
          </h4>
          <router-link to="/assignedcase"  v-if="users.selected == 0"><p class="text-light">Assigned Case</p></router-link>
            <router-link to="/forapprovalcase" v-else-if="users.selected == 1"><p class="text-light">Waiting For Approval Case</p></router-link>
         <router-link to="/empapprovedcase" v-else><p class="text-light">Approved Case</p></router-link>
          <img src="sufeeadmin/images/canvas2.png" alt="">
      </div>
    </div>
  </div>
  <!--/.col-->

  <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-3">
      <div class="card-body pb-0">
        <h4 class="mb-0">
          <span class="count" v-if="users.selected == 0">{{ billedcase }}</span>
          <span class="count" v-else-if="users.selected == 1">{{ billedcase }}</span>
          <span class="count" v-else>{{ waitingforapproveEmp }}</span>
        </h4>
        <router-link to="/billedcase" v-if="users.selected == 0"><p class="text-light">Billed Case</p></router-link>
        <router-link to="/billedcase" v-else-if="users.selected == 1"><p class="text-light">Billed Case</p></router-link>
        <router-link to="/waitingforapproavalcase" v-else><p class="text-light">To be Approved</p></router-link>

      </div>

      <div class="chart-wrapper px-3" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <img src="sufeeadmin/images/canvas3.png" alt="">
    </div>
  </div>
</div>
<!--/.col-->

<div class="col-sm-6 col-lg-3">
  <div class="card text-white bg-flat-color-4">
    <div class="card-body pb-0">

      <h4 class="mb-0">
        <span class="count">0</span>
      </h4>
      <router-link to="/empbillingcase" v-if="users.selected == 0"><p class="text-light">Credit Billed</p></router-link>
      <router-link to="/empbillingcase" v-else-if="users.selected == 1"><p class="text-light">Credit Billed</p></router-link>
      <router-link to="/empbillingcase" v-else><p class="text-light">Billing Case</p></router-link>

      <div class="chart-wrapper px-3" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <img src="sufeeadmin/images/canvas4.png" alt="">
    </div>

  </div>
</div>
</div>
<!--/.col-->
<div class="col-sm-6 col-lg-3">
  <div class="card text-white bg-flat-color-20">
    <div class="card-body pb-0">
      <h4 class="mb-0">
        <span class="count">{{ approvedcase }}</span>
      </h4>
     <router-link to="/approvedcase"><p class="text-light">Approved Case</p></router-link>

      <div class="chart-wrapper px-0" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <img src="sufeeadmin/images/canvas2.png" alt="">
    </div>

  </div>

</div>
</div>
<!--/.col-->

<div class="col-sm-6 col-lg-3">
  <div class="card text-white bg-flat-color-30">
    <div class="card-body pb-0">

      <h4 class="mb-0">
        <span class="count" v-if="users.selected == 0">{{ completedcase }}</span>
        <span class="count" v-else-if="users.selected == 1">{{ completedcase }}</span>
        <span class="count" v-else>{{ completedCaseEmp }}</span>
      </h4>
      <router-link to="/completedcase" v-if="users.selected == 0"><p class="text-light">Completed Case</p></router-link>
      <router-link to="/completedcase" v-else-if="users.selected == 1"><p class="text-light">Completed Case</p></router-link>
      <router-link to="/completedcaseemp" v-else><p class="text-light">Completed Case</p></router-link>

      <div class="chart-wrapper px-0" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <img src="sufeeadmin/images/canvas4.png" alt="">
    </div>

  </div>
</div>
</div>
<!--/.col-->

<div class="col-sm-6 col-lg-3">
  <div class="card text-white bg-flat-color-40">
    <div class="card-body pb-0">
      <h4 class="mb-0">
        <span class="count" v-if="users.selected == 0"> {{  completedcase }}</span>
        <span class="count" v-else-if="users.selected == 1"> {{  completedcase }}</span>
        <span class="count" v-else> {{  onprocessEmp }}</span>
      </h4>
      <router-link to="/billingcase" v-if="users.selected == 0"><p class="text-light">Billing Case</p></router-link>
      <router-link to="/billingcase" v-else-if="users.selected == 1"><p class="text-light">Billing Case</p></router-link>
      <router-link to="/onprocesscase" v-else><p class="text-light">On Process Case</p></router-link>

     <div class="chart-wrapper px-0" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <img src="sufeeadmin/images/canvas.png" alt="">
    </div>

    </div>
</div>
</div>
<!--/.col-->

<div class="col-sm-6 col-lg-3">
  <div class="card text-white bg-flat-color-50">
    <div class="card-body pb-0">

      <h4 class="mb-0">
        <span class="count" v-if="users.selected == 0">{{ rejectedcase }}</span>
        <span class="count" v-else-if="users.selected == 1">{{ rejectedcase }}</span>
        <span class="count" v-else>{{ rejectedcaseEmp }}</span>
      </h4>
       <router-link to="/rejectedcase"><p class="text-light">Rejected Case</p></router-link>

      <div class="chart-wrapper px-3" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <img src="sufeeadmin/images/canvas3.png" alt="">
    </div>
  </div>
</div>
</div>
<div v-if="users.selected != 2 ">
<div class="col-xl-3 col-lg-6">
    <div class="card">
    <div class="card-body">
        <div class="stat-widget-one row">
            <div class="col-md-3">
                <div class="stat-icon dib"><i class="text-success border-success">₹</i></div>
            </div>
            <div class="col-md-9">
                <div class="stat-content dib">
                    <div class="stat-text">Today's Collection</div>
                    <div class="stat-digit">{{ OverallTotalCollection }}</div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="col-xl-3 col-lg-6">
    <div class="card">
    <div class="card-body">
        <div class="stat-widget-one row">
            <div class="col-md-3">
                <div class="stat-icon dib"><i class="text-success border-success">₹</i></div>
            </div>
            <div class="col-md-9">
                <div class="stat-content dib">
                    <div class="stat-text">Due Amount</div>
                    <div class="stat-digit">{{ totalActualAmount-OverallTotalCollection }}</div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="col-xl-3 col-lg-6">
    <div class="card">
    <div class="card-body">
        <div class="stat-widget-one row">
            <div class="col-md-3">
                <div class="stat-icon dib"><i class="text-success border-success">₹</i></div>
            </div>
            <div class="col-md-9">
                <div class="stat-content dib">
                    <div class="stat-text">Monthly Collection</div>
                    <div class="stat-digit">{{ monthlyCollection }}</div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="col-xl-3 col-lg-6">
    <div class="card">
    <div class="card-body">
        <div class="stat-widget-one row">
            <div class="col-md-3">
                <div class="stat-icon dib"><i class="text-success border-success">₹</i></div>
            </div>
            <div class="col-md-9">
                <div class="stat-content dib">
                    <div class="stat-text">Credit Amount</div>
                    <div class="stat-digit">0</div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

</div>
</div>
</div>
</template>

<script>
export default {
  data() {
    return {
        approvedcase: '',
        billedcase: '',
        onprocesscase: '',
      NewRegistered: '',
      rejectedcase:'',
      waitingforapprove: '',
      assignedcase: '',
      completedcase: '',
      empNewRegistered: '',
      empWaitingforapprove: '',
      empRejectedcase: '',
      empCompletedcase: '',
      empApprovedcase: '',
      users: {
          email: '',
          selected: ''
      },
      OveralltotalAmount:'',
      OverallgstAmount:'',
      todaystotalAmount: '',
      todaysgstAmount: '',
      TodaysTotalAmountByCash: '',
      TodaysTotalAmountByCheque: '',
      TodaysTotalAmountByRtgs: '',
      monthlyCollection: '',
      OverallTotalCollection: '',
      searchResult: '',
      totalActualAmount: '',
        newRegisteredEmp: '',
        onprocessEmp: '',
        waitingforapproveEmp: '',
        completedCaseEmp: '',
        approvedCaseEmp: '',
        rejectedcaseEmp: ''
    }
  },
  created(){
    this.loadCounter();
    this. fetchUser();
    this.loadEmployeeCounter();
    this.fetchCollectionRegister();
    const token = localStorage.getItem('token');
        Event.$on("searching", inputWord => {
            axios.get('/api/search?q='+inputWord+'&token='+token)
            .then((data) => {
                this.searchResult = data.data;
                // import('./MyComponent.vue')
            // Vue.component('search', require('../components/Search.vue').default);
            })
    })
  },
  methods: {
    loadCounter(){
    const token = localStorage.getItem('token');
      fetch('api/counter?token='+token)
      .then(res => res.json())
      .then(res => {
        this.NewRegistered = res.newRegistered;
        this.waitingforapprove = res.waitingforapprove;
        this.assignedcase = res.assignedcase;
        this.completedcase = res.completedcase;
        this.approvedcase = res.approvedCase;
        this.billedcase = res.billedcase;
        this.rejectedcase = res.rejectedcase;
        this.onprocesscase = res.onprocess;
        this.newRegisteredEmp = res.newRegisteredEmp;
        this.onprocessEmp = res.onprocessEmp;
        this.waitingforapproveEmp = res.waitingforapproveEmp;
        this.completedCaseEmp = res.completedCaseEmp;
        this.approvedCaseEmp = res.approvedCaseEmp;
        this.rejectedCaseEmp = res.rejectedCaseEmp;
      })
    },
    loadEmployeeCounter(){
        const token = localStorage.getItem('token');
        fetch('api/employeecounter?token='+token)
        .then(res => res.json())
        .then(res => {
            this.empNewRegistered = res.employeeAssigned;
            this.empWaitingforapprove = res.waitingforapprove;
            this.empRejectedcase = res.rejectedcase;
            this.empCompletedcase = res.completedcase;
            this.empApprovedcase = res.approvecaseEmp;
        })
    },
    fetchUser(){
        const token = localStorage.getItem('token');
        fetch('/api/auth/me?token=' +token)
                .then(res=>res.json())
                .then(data => {
                    this.users.email = data.email;
                    this.users.selected = data.selected;
                    if(data.error == "Token is expired"){
                        window.location.href = '/';
                    }
                })
        },
        fetchCollectionRegister(){
        const token = localStorage.getItem('token');
        fetch('api/fetchcollectionregister?token='+token)
        .then(res => res.json())
        .then((res) => {
            this.OveralltotalAmount = res.OverallTotalAmount;
            this.OverallTotalCollection = res.OverallTotalCollection;
            this.totalActualAmount = res.actualAmount;
            this.OverallgstAmount = res.OverallgstAmount;
            this.todaystotalAmount = res.todaystotalAmount;
            this.todaysgstAmount = res.todaysgstAmount;
            this.TodaysTotalAmountByCash = res.TodaysTotalAmountByCash;
            this.TodaysTotalAmountByCheque = res.TodaysTotalAmountByCheque;
            this.TodaysTotalAmountByRtgs = res.TodaysTotalAmountByRtgs;
            this.monthlyCollection = res.monthlyCollection;
        })
    }
  },
  mounted() {
    window.onpopstate = event => {
      if (
        window.localStorage.getItem("info") !== null &&
        this.$route.path == "/siginin"
      ) {
        this.$router.push("/dashboard");
      }
    };
  }
}
</script>
