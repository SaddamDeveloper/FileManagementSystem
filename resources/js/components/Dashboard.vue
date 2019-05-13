<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
          <div class="card-body pb-0">
            <h4 class="mb-0">
              <span class="count">{{NewRegistered}}</span>
            </h4>
            <router-link to="/registeredcase"><p class="text-light">Registered Case</p></router-link>

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
            <span class="count">{{ assignedcase }}</span>
          </h4>
         <router-link to="/assignedcase"><p class="text-light">Assigned Case</p></router-link>

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
        <span class="count"> {{  completedcase }}</span>
      </h4>
      <router-link to="/billingcase"><p class="text-light">Billing Case</p></router-link>

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
      <p class="text-light">Canceled Case</p>

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
      completedcase: ''
    }
  },
  created(){
    this.loadCounter();
  },
  methods: {
    loadCounter(){
      fetch('api/counter')
      .then(res => res.json())
      .then(res => {
        console.log(res.newRegistered);
        this.NewRegistered = res.newRegistered;
        this.waitingforapprove = res.waitingforapprove;
        this.assignedcase = res.assignedcase;
        this.completedcase = res.completedcase;
      })
    },
  },
  mounted() {
    console.log('Component mounted.')
  }
}
</script>
