<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
          <div class="card-body pb-0">
            <h4 class="mb-0">
              <span class="count" v-if="users.selected == 0">{{ NewRegistered }}</span>
              <span class="count" v-else-if="users.selected == 1">{{ NewRegistered }}</span>
              <span class="count" v-else>{{ empNewRegistered }}</span>
            </h4>
            <router-link to="/registeredcase"  v-if="users.selected == 0"><p class="text-light">Register New Case</p></router-link>
            <router-link to="/newcase" v-else-if="users.selected == 1"><p class="text-light">Newly Registered Case</p></router-link>
            <router-link to="/employeeassignedcase" v-else><p class="text-light">New Case</p></router-link>

            <div class="chart-wrapper px-0" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="widgetChart1" height="70" width="198" class="chartjs-render-monitor" style="display: block; width: 198px; height: 70px;"></canvas>
          </div>

        </div>

      </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-flat-color-2">
        <div class="card-body pb-0">
          <h4 class="mb-0">
            <span class="count" v-if="users.selected == 0">{{ empCompletedcase }}</span>
            <span class="count" v-else-if="users.selected == 1">{{ empCompletedcase }}</span>
            <span class="count" v-else>{{ empCompletedcase }}</span>
          </h4>
          <router-link to="/a"  v-if="users.selected == 0"><p class="text-light">Assigned Case</p></router-link>
            <router-link to="/forapprovalcase" v-else-if="users.selected == 1"><p class="text-light">Waiting For Approval Case</p></router-link>
         <router-link to="/empapprovedcase" v-else><p class="text-light">Approved Case</p></router-link>

          <div class="chart-wrapper px-0" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          <canvas id="widgetChart2" height="70" width="198" class="chartjs-render-monitor" style="display: block; width: 198px; height: 70px;"></canvas>
        </div>

      </div>
    </div>
  </div>
  <!--/.col-->

  <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-3">
      <div class="card-body pb-0">
        <h4 class="mb-0">
          <span class="count">{{ empWaitingforapprove }}</span>
        </h4>
        <router-link to="/waitingforapproavalcase" v-if="users.selected == 0"><p class="text-light">Billed Case</p></router-link>
        <router-link to="/waitingforapproavalcase" v-else-if="users.selected == 1"><p class="text-light">Billed Case</p></router-link>
        <router-link to="/waitingforapproavalcase" v-else><p class="text-light">To be Approved</p></router-link>

      </div>

      <div class="chart-wrapper px-0" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <canvas id="widgetChart3" height="53" width="228" class="chartjs-render-monitor" style="display: block; width: 228px; height: 53px;"></canvas>
    </div>
  </div>
</div>
<!--/.col-->

<div class="col-sm-6 col-lg-3">
  <div class="card text-white bg-flat-color-4">
    <div class="card-body pb-0">

      <h4 class="mb-0">
        <span class="count"></span>
      </h4>
      <router-link to="/empbillingcase" v-if="users.selected == 0"><p class="text-light">Credit Billed</p></router-link>
      <router-link to="/empbillingcase" v-else-if="users.selected == 1"><p class="text-light">Credit Billed</p></router-link>
      <router-link to="/empbillingcase" v-else><p class="text-light">Billing Case</p></router-link>

      <div class="chart-wrapper px-3" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <canvas id="widgetChart4" height="38" width="166" class="chartjs-render-monitor" style="display: block; width: 166px; height: 38px;"></canvas>
    </div>

  </div>
</div>
</div>
<!--/.col-->
<div class="col-sm-6 col-lg-3">
  <div class="card text-white bg-flat-color-1">
    <div class="card-body pb-0">
      <h4 class="mb-0">
        <span class="count">{{ completedcase }}</span>
      </h4>
     <router-link to="/approvedcase"><p class="text-light">Approved Case</p></router-link>

      <div class="chart-wrapper px-0" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <canvas id="widgetChart1" height="70" width="198" class="chartjs-render-monitor" style="display: block; width: 198px; height: 70px;"></canvas>
    </div>

  </div>

</div>
</div>
<!--/.col-->

<div class="col-sm-6 col-lg-3">
  <div class="card text-white bg-flat-color-2">
    <div class="card-body pb-0">

      <h4 class="mb-0">
        <span class="count">{{ completedcase }}</span>
      </h4>
      <router-link to="/completedcase"><p class="text-light">Completed Case</p></router-link>

      <div class="chart-wrapper px-0" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <canvas id="widgetChart2" height="70" width="198" class="chartjs-render-monitor" style="display: block; width: 198px; height: 70px;"></canvas>
    </div>

  </div>
</div>
</div>
<!--/.col-->

<div class="col-sm-6 col-lg-3">
  <div class="card text-white bg-flat-color-3">
    <div class="card-body pb-0">
      <h4 class="mb-0">
        <span class="count" v-if="users.selected == 0"> {{  completedcase }}</span>
        <span class="count" v-else-if="users.selected == 1"> {{  completedcase }}</span>
        <span class="count" v-else> {{  completedcase }}</span>
      </h4>
      <router-link to="/billingcase" v-if="users.selected == 0"><p class="text-light">Billing Case</p></router-link>
      <router-link to="/billingcase" v-else-if="users.selected == 1"><p class="text-light">Billing Case</p></router-link>
      <router-link to="/onprocesscase" v-else><p class="text-light">On Process Case</p></router-link>

     <div class="chart-wrapper px-0" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <canvas id="widgetChart1" height="70" width="198" class="chartjs-render-monitor" style="display: block; width: 198px; height: 70px;"></canvas>
    </div>

    </div>
</div>
</div>
<!--/.col-->

<div class="col-sm-6 col-lg-3">
  <div class="card text-white bg-flat-color-4">
    <div class="card-body pb-0">

      <h4 class="mb-0">
        <span class="count">{{  }}</span>
      </h4>
       <router-link to="/rejectedcase"><p class="text-light">Rejected Case</p></router-link>

      <div class="chart-wrapper px-3" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <canvas id="widgetChart4" height="38" width="166" class="chartjs-render-monitor" style="display: block; width: 166px; height: 38px;"></canvas>
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
      NewRegistered: '',
      waitingforapprove: '',
      assignedcase: '',
      completedcase: '',
      empNewRegistered: '',
      empWaitingforapprove: '',
      empRejectedcase: '',
      empCompletedcase: '',
      users: {
          email: '',
          selected: ''
      }
    }
  },
  created(){
    this.loadCounter();
    this. fetchUser();
    this.loadEmployeeCounter();
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
