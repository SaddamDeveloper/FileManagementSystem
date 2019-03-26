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
        <form @submit.prevent="createCase" @keydown="form.onKeydown($event)">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Case Details</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <div class="form-group">
                                <strong>Case ID: 675465KN6754</strong>
                            </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-12">
                                        <select name="clientType" v-model="form.clientType" class="form-control" :class="{ 'is-invalid': form.errors.has('clientType') }">
                                            <option v-for="option in options" v-bind:value="option.id">{{ option.name }}</option>
                                        </select>
                                        <has-error :form="form" field="clientType"></has-error>
                                    </div>
                                </div>
                        <div class="form-group">
                            <input type="text" v-model="form.typeofwork" id="typeofwork" name="typeofwork" placeholder="Type of work" class="form-control" :class="{ 'is-invalid': form.errors.has('typeofwork') }">
                            <has-error :form="form" field="typeofwork"></has-error>
                        </div>
                        <div class="form-group">
                            <date-picker name="time2" v-model="form.time2" :lang="lang" :class="{ 'is-invalid': form.errors.has('time2') }"></date-picker>
                            <has-error :form="form" field="time2"></has-error>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                                <input class="form-control" name="amount" v-model="form.amount" type="number" placeholder="Amount" :class="{ 'is-invalid': form.errors.has('amount') }">
                                <has-error :form="form" field="amount"></has-error>
                        </div>
                        </div>

                      <div class="form-group">
                            <select class="form-control" v-model="selected" name="selected">
                                <option v-for="optiontype in optiontypes" v-bind:value="optiontype.id">{{ optiontype.name}}</option>
                            </select>
                            <has-error :form="form" field="selected"></has-error>
                    </div>
                    </div>
                </div>
                        <div class="card" v-if="selected === 2">
                            <div class="card-header">
                                <strong class="card-title">Cash</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="client's_info">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-inr"></i>
                                                    </div>
                                                    <input type="number" placeholder="Advance Amount" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span> Due Amount: <i class="fa fa-inr"></i> 120.00</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 2000
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input id="den_amt" name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 500
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input id="den_amt" name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 200
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input id="den_amt" name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 100
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input id="den_amt" name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 50
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input id="den_amt" name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 20
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input id="den_amt" name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 10
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input id="den_amt" name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 5
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input id="den_amt" name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Grand Total: <i class="fa fa-inr"></i> 250</strong></div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="card" v-if="selected === 3">
                            <div class="card-header">
                                <strong class="card-title">Cheque</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="client's_info">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input id="" name="name" type="text" class="form-control" placeholder="Cheque Number">
                                            </div>
                                            <div class="form-group has-success">
                                                <input id="no" name="no" type="text" class="form-control" placeholder="Bank Name">
                                            </div>
                                            <div class="form-group">
                                                <input id="altno" name="altno" type="number" class="form-control" placeholder="Phone">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="card" v-if="selected === 4">
                            <div class="card-header">
                                <strong class="card-title">RTGS/NEFT</strong>
                            </div>
                            <div class="card-body">
                                <div id="client's_info">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input id="" name="name" type="number" class="form-control" placeholder="RTGS/NEFT No">
                                            </div>
                                            <div class="form-group has-success">
                                                <input id="no" name="no" type="text" class="form-control" placeholder="Bank Name">
                                            </div>
                                            <div class="form-group">
                                                <input id="altno" name="altno" type="text" class="form-control" placeholder="Phone no">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>

            <div class="col-lg-8">
                        <div class="card" v-if="form.clientType === 5">
                            <div class="card-header">
                                <strong class="card-title">Client Details (Existing Client)</strong>
                            </div>
                            <div class="card-body">
                                <div id="client's_info">
                                    <div class="card-body">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input id="personid" name="personid" type="text" class="form-control" placeholder="Contact Person ID">
                                            </div>
                                        </div>
                                        <div class="col-md-2"><div class="form-group"><strong>Or</strong></div></div>
                                        <div class="col-md-5">
                                            <div class="form-group has-success">
                                                <input id="personno" name="personno" type="text" class="form-control" placeholder="Contact Person No">
                                            </div>
                                        </div>

                                        </div>
                                        </div>
                                    </div>
                        </div>
                    <div class="card" v-if="form.clientType === 5">
                        <div class="card-header">
                            <strong class="card-title">Client Details (New Client)</strong>
                        </div>
                        <div class="card-body">
                            <div id="client's_info">
                                <div class="card-body">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="personname" name="personname" type="text" class="form-control" placeholder="Conatact Person Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <input id="percontactNo" name="percontactNo" type="text" class="form-control" placeholder="Conatct No">
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="organisationname" name="organisationname" type="text" class="form-control" placeholder="Organisation Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <input id="organisationtelno" name="organisationtelno" type="text" class="form-control" placeholder="Organisation Tel No">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <input id="altno" name="altno" type="text" class="form-control" placeholder="Department">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <textarea id="organisationaddr" name="organisationaddr" type="text" class="form-control" placeholder="Organisation Address"></textarea>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card" v-if="form.clientType === 4">
                            <div class="card-header">
                                <strong class="card-title">Client Details (Existing Client)</strong>
                            </div>
                            <div class="card-body">
                                <div id="client's_info">
                                    <div class="card-body">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input id="personid" name="personid" type="text" class="form-control" placeholder="Contact Person ID">
                                            </div>
                                        </div>
                                        <div class="col-md-2"><div class="form-group"><strong>Or</strong></div></div>
                                        <div class="col-md-5">
                                            <div class="form-group has-success">
                                                <input id="personno" name="personno" type="text" class="form-control" placeholder="Contact Person No">
                                            </div>
                                        </div>

                                        </div>
                                        </div>
                                    </div>
                        </div>
                    <div class="card" v-if="form.clientType === 4">
                        <div class="card-header">
                            <strong class="card-title">Client Details (New Client)</strong>
                        </div>
                        <div class="card-body">
                            <div id="client's_info">
                                <div class="card-body">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="personname" name="personname" type="text" class="form-control" placeholder="Conatact Person Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <input id="perscontactno" name="perscontactno" type="text" class="form-control" placeholder="Conatct No">
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="organisationname" name="organisationname" type="text" class="form-control" placeholder="Organisation Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <input id="organisationtelno" name="organisationtelno" type="text" class="form-control" placeholder="Organisation Tel No">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <input id="altno" name="altno" type="text" class="form-control" placeholder="Department">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <textarea id="organisationaddr" name="organisationaddr" type="text" class="form-control" placeholder="Organisation Address"></textarea>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card" v-if="form.clientType === 2">
                            <div class="card-header">
                                <strong class="card-title">Client Details (Existing Client)</strong>
                            </div>
                            <div class="card-body">
                                <div id="client's_info">
                                    <div class="card-body">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input id="name" name="name" type="text" class="form-control" placeholder="Client ID">
                                            </div>
                                        </div>
                                        <div class="col-md-2"><div class="form-group"><strong>Or</strong></div></div>
                                        <div class="col-md-5">
                                            <div class="form-group has-success">
                                                <input id="no" name="no" type="text" class="form-control" placeholder="Contact No">
                                            </div>
                                        </div>

                                        </div>
                                        </div>
                                    </div>
                                </div>
                        <div class="card" v-if="form.clientType === 3">
                            <div class="card-header">
                                <strong class="card-title">Client Details (Existing Client)</strong>
                            </div>
                            <div class="card-body">
                                <div id="client's_info">
                                    <div class="card-body">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input id="personid" name="personid" type="text" class="form-control" placeholder="Contact Person ID">
                                            </div>
                                        </div>
                                        <div class="col-md-2"><div class="form-group"><strong>Or</strong></div></div>
                                        <div class="col-md-5">
                                            <div class="form-group has-success">
                                                <input id="personno" name="personno" type="text" class="form-control" placeholder="Contact Person No">
                                            </div>
                                        </div>

                                        </div>
                                        </div>
                                    </div>
                        </div>

                        <div class="card" v-if="form.clientType === 3">
                            <div class="card-header">
                                <strong class="card-title">Client Details (New Client)</strong>
                            </div>
                            <div class="card-body">
                                <div id="client's_info">
                                    <div class="card-body">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="personname" name="personname" type="text" class="form-control" placeholder="Conatact Person Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input id="pcontactNo" name="pcontactNo" type="text" class="form-control" placeholder="Conatct No">
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="organisationname" name="organisationname" type="text" class="form-control" placeholder="Organisation Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input id="organisationtelno" name="organisationtelno" type="text" class="form-control" placeholder="Organisation Tel No">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input id="altno" name="altno" type="text" class="form-control" placeholder="Department">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <textarea id="organisationaddr" name="organisationaddr" type="text" class="form-control" placeholder="Organisation Address"></textarea>
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        <div class="card" v-if="form.clientType === 2">
                            <div class="card-header">
                                <strong class="card-title">Client Details (New Client)</strong>
                            </div>
                            <div class="card-body">
                                <div id="client's_info">
                                    <div class="card-body">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="clientName" v-model="form.clientName" name="clientName" type="text" class="form-control" placeholder="Client's Name" :class="{ 'is-invalid': form.errors.has('clientName') }">
                                                <has-error :form="form" field="clientName"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input id="contactNo" v-model="form.contactNo" name="contactNo" type="text" class="form-control" placeholder="Contact No" :class="{ 'is-invalid': form.errors.has('contactNo') }">
                                                <has-error :form="form" field="contactNo"></has-error>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="altContactNo" v-model="form.altContactNo" name="altContactNo" type="text" class="form-control" placeholder="Alternate Contact No" :class="{ 'is-invalid': form.errors.has('altContactNo') }">
                                                <has-error :form="form" field="altContactNo"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input type="email" v-model="form.email" id="email" name="email" class="form-control" placeholder="Email" :class="{ 'is-invalid': form.errors.has('email') }">
                                                <has-error :form="form" field="email"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group has-success">
                                                <textarea id="address" v-model="form.address" name="adress" class="form-control" placeholder="Address" :class="{ 'is-invalid': form.errors.has('address') }"></textarea>
                                                <has-error :form="form" field="address"></has-error>
                                            </div>
                                        </div>
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
                </form>
                            <!-- <button @click="print">Print
                            </button> -->
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
      },
      selected: "1",
            optiontypes: [
                { id: 1, name: 'Select Payment Method'},
                { id: 2, name: 'Cash' },
                { id: 3, name: 'Cheque' },
                { id: 4, name: 'RTGS/NEFT' }
            ],
       clientTypeSelection: "1",
                options: [
                    {id: 1, name: 'Select Payment Method'},
                    {id: 2, name: 'Individual'},
                    {id: 3, name: 'Govt'},
                    {id: 4, name: 'Pvt Ltd'},
                    {id: 5, name: 'NGO'}
                ],

        form: new Form({
            caseid: 'XYZ123',
            clientType: '',
            typeofwork: '',
            amount: '',
            clientName: '',
            contactNo: '',
            altContactNo: '',
            email: '',
            address: '',
            time2: '',
            clientid: 'TRY123',
            paymentmode: '1',
        })
    }
},
methods: {
    createCase(){
        this.$Progress.start();
        this.form.post('api/case')
        .then(()=>{
            toast.fire({
                type: 'success',
                title: 'Saved successfully'
            })
            this.$Progress.finish();
        })
        .catch(()=> {

        })
    },
    //  print () {
    //     this.print(this.form)
    // }
},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
