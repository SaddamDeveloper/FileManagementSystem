<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
          <div class="card-body pb-0">

            <h4 class="mb-0">
              <span class="count">{{ NewRegistered }}</span>
            </h4>
            <router-link to="/employeeassignedcase"><p class="text-light">Assigned Case</p></router-link>

            <div class="chart-wrapper px-0" style="height:70px;" height="70"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="widgetChart1" height="70" width="198" class="chartjs-render-monitor" style="display: block; width: 198px; height: 70px;"></canvas>
          </div>

        </div>

      </div>
    </div>

    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-flat-color-2">
        <div class="card-body pb-0">

          <h4 class="mb-0">
            <span class="count">10468</span>
          </h4>
          <router-link to="/assignedcase"><p class="text-light">Canceled Case</p></router-link>

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
        <div class="dropdown float-right">
          <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
            <div class="dropdown-menu-content">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <h4 class="mb-0">
          <span class="count">10468</span>
        </h4>
        <p class="text-light">On Process Case</p>

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
        <span class="count">10468</span>
      </h4>
      <p class="text-light">Pending Case</p>

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
        <span class="count">{{completedcase}}</span>
      </h4>
      <router-link to="/empapprovedcase"><p class="text-light">Approved Case</p></router-link>

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
        <span class="count">{{waitingforapprove}}</span>
      </h4>
      <router-link to="/waitingforapproavalcase"><p class="text-light">Approving</p></router-link>

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
        <span class="count">{{completedcase}}</span>
      </h4>
      <router-link to="/empbillingcase"><p class="text-light">Billing Case</p></router-link>

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
        <span class="count">{{rejectedcase}}</span>
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
  props : ['user'],
  data() {
    return {
      NewRegistered: '',
      waitingforapprove: '',
      rejectedcase: '',
      completedcase: ''
    }
},
created(){
    this.loadCounter();
},
methods: {
    loadCounter(){
      fetch('api/employeecounter/'+this.$props.user.employee_id)
      .then(res => res.json())
      .then(res => {
          this.NewRegistered = res.employeeAssigned;
          this.waitingforapprove = res.waitingforapprove;
          this.rejectedcase = res.rejectedcase;
          this.completedcase = res.completedcase;
      })
    },
},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
