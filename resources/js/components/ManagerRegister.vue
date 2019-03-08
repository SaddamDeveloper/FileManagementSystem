<template>
    <div class="container-fluid">
            <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Institutional Client</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Institutional Client</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Case Details</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                                <strong>Case ID:</strong>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-12">
                                        <select name="select" id="select" class="form-control">
                                            <option value="0">Please select client type</option>
                                            <option value="1">Govt</option>
                                            <option value="1">Pvt Ltd</option>
                                            <option value="1">Individual</option>
                                            <option value="1">NGO</option>
                                        </select>
                                    </div>
                                </div>
                        <div class="form-group">
                            <input type="text" id="company" placeholder="Type of work" class="form-control">
                        </div>
                        <div class="form-group">
                            <date-picker v-model="time1" :lang="lang"></date-picker>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                                <input class="form-control" type="number" placeholder="Amount">
                        </div>
                        </div>

                      <div class="form-group">

                                        <select name="select" id="select" class="form-control">
                                            <option value="0">Please select Payement Mode</option>
                                            <option value="1">Cash</option>
                                            <option value="1">Cheque</option>
                                            <option value="1">RTGS/NEFT</option>
                                        </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Client Details</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="client's_info">
                                    <div class="card-body">
                                        <!-- <div class="card-title">
                                            <h3 class="text-center">Client's Info</h3>
                                        </div> -->
                                        <!-- <hr> -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="name" name="name" type="text" class="form-control" placeholder="Client ID">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input id="no" name="no" type="text" class="form-control" placeholder="Contact No">
                                            </div>
                                        </div>

                                        </div>
                                        </div>
                                    </div>
                                </div>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Client Details</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="client's_info">
                                    <div class="card-body">
                                        <!-- <div class="card-title">
                                            <h3 class="text-center">Client's Info</h3>
                                        </div> -->
                                        <!-- <hr> -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="name" name="name" type="text" class="form-control" placeholder="Client's Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input id="no" name="no" type="text" class="form-control" placeholder="Contact No">
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="altno" name="altno" type="text" class="form-control" placeholder="Alternate Contact No">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <textarea id="address" name="adress" class="form-control" placeholder="Address"></textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                                                    <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Cash</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="client's_info">
                                    <div class="card-body">
                                        <form action="" method="post" novalidate="novalidate">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="" name="name" type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input id="no" name="no" type="text" class="form-control" placeholder="Contact No">
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="altno" name="altno" type="text" class="form-control" placeholder="Alternate Contact No">
                                            </div>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </div>
                        </div> <!-- .card -->
                        <hr/>
                        <div class="col-md-12">
                            <div style="float: right">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                            </div>
                        </div>
            </div>
</template>

<script>
import DatePicker from 'vue2-datepicker'
export default {
  components: { DatePicker },
  data() {
    return {
      time1: '',
      time2: '',
      time3: '',
      // custom lang
      lang: {
        days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        pickers: ['next 7 days', 'next 30 days', 'previous 7 days', 'previous 30 days'],
        placeholder: {
          date: 'Delivey Date',
          dateRange: 'Select Date Range'
        }
      },
      // custom range shortcuts
      shortcuts: [
        {
          text: 'Today',
          onClick: () => {
            this.time3 = [ new Date(), new Date() ]
          }
        }
      ],
      timePickerOptions:{
        start: '00:00',
        step: '00:30',
        end: '23:30'
      }
    }
},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
