<template>
    <div class="container-fluid">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Register Case</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Register Case</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
        <div class="col-md-12">
            <form @submit.prevent="addCase">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Case Details</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <div class="form-group">
                                <strong>CaseID: <input type="text" readonly v-model="casee.caseid"> </strong>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <select name="clientType" class="form-control" v-model="casee.clientType">
                                    <option v-for="option in options" v-bind:value="option.id">{{ option.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" id="typeofwork" name="typeofwork" placeholder="Type of work" class="form-control" v-model="casee.typeofwork">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" v-model="casee.time2">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                                <input class="form-control" name="amount" type="number" placeholder="Amount" v-model="casee.amount">
                        </div>
                        </div>

                      <div class="form-group">
                        <select class="form-control" name="selected" v-model="casee.selected">
                            <option v-for="optiontype in optiontypes" v-bind:value="optiontype.id">{{ optiontype.name}}</option>
                        </select>
                    </div>
                    </div>
                </div>
                    <div class="card" v-if="casee.selected === 2">
                        <div class="card-header">
                            <strong class="card-title">Cash</strong>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="advamount" type="text" v-model="casee.advamount" placeholder="Advance Amount" class="form-control">
                                </div>
                                <div class="form-group">
                                        <label>Due Amount:</label>
                                    <span>{{ a = casee.amount-casee.advamount }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Paid Amount:</label>
                                <span>{{ casee.advamount }}</span>
                                </div>
                            </div>

                        </div>
                        </div>
                        <div class="card"  v-if="casee.selected === 3">
                            <div class="card-header">
                                <strong class="card-title">Cheque</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input id="" name="name" type="text" class="form-control" placeholder="Cheque Number" v-model="casee.rtgsNo">
                                            </div>
                                            <div class="form-group has-success">
                                                <input id="no" name="no" type="text" class="form-control" placeholder="Bank Name" v-model="casee.bankName">
                                            </div>
                                            <div class="form-group">
                                                <input id="altno" name="altno" type="number" class="form-control" placeholder="Phone" v-model="casee.bankersPhone">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="card"  v-if="casee.selected == 4">
                            <div class="card-header">
                                <strong class="card-title">RTGS/NEFT</strong>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input name="rtgsNo" type="number" class="form-control" placeholder="RTGS/NEFT No" v-model="casee.rtgsNo">
                                            </div>
                                            <div class="form-group has-success">
                                                <input name="bankName" type="text" class="form-control" placeholder="Bank Name" v-model="casee.bankName">
                                            </div>
                                            <div class="form-group">
                                                <input name="bankersPhone" type="text" class="form-control" placeholder="Phone no" v-model="casee.bankersPhone">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                        <div class="card" v-if="casee.clientType === 5">
                            <div class="card-header">
                                <strong class="card-title">Client Details (Existing Client)</strong>
                            </div>
                            <div class="card-body">
                                <div id="client's_info">
                                    <div class="card-body">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <!--<input id="personid" name="personid" v-model="queryString" v-on:keyup="getResults()" type="text" class="form-control" placeholder="Contact Person ID">-->
                                                <!--<div class="options">-->
                                                    <!--<ul>-->
                                                        <!--<li v-for="detail in clientDetails" @click="selectClient(detail)">{{ detail.clientid }}</li>-->
                                                    <!--</ul>-->
                                                <!--</div>-->
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
                    <div class="card" v-if="casee.clientType === 5">
                        <div class="card-header">
                            <strong class="card-title">Client Details (New Client)</strong>
                        </div>
                        <div class="card-body">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="personname" type="text" class="form-control" placeholder="Conatact Person Name" v-model="casee.clientPersonName">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input id="pcontactNo" name="pcontactNo" type="text" class="form-control" placeholder="Conatct No" v-model="casee.personContactNo">
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="orgName" type="text" class="form-control" placeholder="Organisation Name" v-model="casee.orgName">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input name="telNo" type="text" class="form-control" placeholder="Organisation Tel No" v-model="casee.telNo">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input name="altno" type="text" class="form-control" placeholder="Department" v-model="casee.dept">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <textarea  name="organisationaddr" type="text" class="form-control" placeholder="Organisation Address" v-model="casee.addr"></textarea>
                                            </div>
                                        </div>
                            </div>

                        </div>
                        <div class="card" v-if="casee.clientType === 4">
                            <div class="card-header">
                                <strong class="card-title">Client Details (Existing Client)</strong>
                            </div>
                            <div class="card-body">
                                <div >
                                    <div class="card-body">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input  name="personid" type="text" class="form-control" placeholder="Contact Person ID">
                                            </div>
                                        </div>
                                        <div class="col-md-2"><div class="form-group"><strong>Or</strong></div></div>
                                        <div class="col-md-5">
                                            <div class="form-group has-success">
                                                <input name="personno" type="text" class="form-control" placeholder="Contact Person No">
                                            </div>
                                        </div>

                                        </div>
                                        </div>
                                    </div>
                        </div>
                    <div class="card" v-if="casee.clientType === 4">
                        <div class="card-header">
                            <strong class="card-title">Client Details (New Client)</strong>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="personname" name="personname" type="text" class="form-control" placeholder="Conatact Person Name" v-model="casee.clientPersonName">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <input name="personContactNo" type="text" class="form-control" placeholder="Conatct No" v-model="casee.personContactNo">
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="organisationname" name="organisationname" type="text" class="form-control" placeholder="Organisation Name" v-model="casee.orgName">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <input id="organisationtelno" name="organisationtelno" type="text" class="form-control" placeholder="Organisation Tel No" v-model="casee.telNo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <input  name="altno" type="text" class="form-control" placeholder="Department" v-model="casee.dept">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <textarea id="organisationaddr" name="organisationaddr" type="text" class="form-control" placeholder="Organisation Address" v-model="casee.addr"></textarea>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card" v-if="casee.clientType === 3">
                            <div class="card-header">
                                <strong class="card-title">Client Details (Existing Client)</strong>
                            </div>
                            <div class="card-body">
                                <div >
                                    <div class="card-body">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input id="personid" name="personid" type="text" class="form-control" placeholder="Contact Person ID">
                                            </div>
                                        </div>
                                        <div class="col-md-2"><div class="form-group"><strong>Or</strong></div></div>
                                        <div class="col-md-5">
                                            <div class="form-group has-success">
                                                <input name="personno" type="text" class="form-control" placeholder="Contact Person No">
                                            </div>
                                        </div>

                                        </div>
                                        </div>
                                    </div>
                        </div>

                        <div class="card" v-if="casee.clientType === 3">
                            <div class="card-header">
                                <strong class="card-title">Client Details (New Client)</strong>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="card-body">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="personname" type="text" class="form-control" placeholder="Conatact Person Name" v-model="casee.clientPersonName" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input id="pcontactNo" name="pcontactNo" type="text" class="form-control" placeholder="Conatct No" v-model="casee.personContactNo" >
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="organisationname" type="text" class="form-control" placeholder="Organisation Name" v-model="casee.orgName" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input name="organisationtelno" type="text" class="form-control" placeholder="Organisation Tel No" v-model="casee.telNo">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input name="altno" type="text" class="form-control" placeholder="Department" v-model="casee.dept">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <textarea  name="organisationaddr" type="text" class="form-control" placeholder="Organisation Address" v-model="casee.addr"></textarea>
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card" v-if="casee.clientType === 2">
                            <div class="card-header">
                                <strong class="card-title">Client Details (Existing Client)</strong>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="card-body">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input name="personid" v-model="queryString" @input="queryString = $event.target.value.toUpperCase()" v-on:keyup="getResults()" v-text="queryString" type="text" class="form-control" placeholder="Contact Person ID">
                                                <div class="options">
                                                    <ul>
                                                        <li v-for="(detail, index) in clientDetails" v-show="!visible" @click="selectClient(detail)" v-text="detail.clientid">{{ detail.clientid }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2"><div class="form-group"><strong>Or</strong></div></div>
                                        <div class="col-md-5">
                                            <div class="form-group has-success">
                                                <input name="personno" type="text" v-model="clientNo" v-on:keyup="getPhoneNo()" v-text="clientNo" class="form-control" placeholder="Contact Person No">
                                                <div class="options">
                                                    <ul>
                                                        <li v-for="(detail, index) in clientDetailsNo" @click="selectClientsNo(detail)" v-text="detail.contactNo">{{ detail.contactNo }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="card" v-if="casee.clientType === 2">
                            <div class="card-header">
                                <strong class="card-title">Client Details (New Client)</strong>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="card-body">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="clientName" name="clientName" type="text" class="form-control" placeholder="Client's Name" v-model="casee.clientName" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input id="contactNo" name="contactNo" type="text" class="form-control" placeholder="Contact No" v-model="casee.contactNo" required>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="altContactNo" name="altContactNo" type="text" class="form-control" placeholder="Alternate Contact No" v-model="casee.altContactNo" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" v-model="casee.email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group has-success">
                                                <textarea id="address"  name="adress" class="form-control" placeholder="Address" v-model="casee.address"></textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            </div>
                        <div class="col-md-12 mb-4">
                            <div style="float: right">
                                <button type="submit" class="btn btn-primary btn-sm" @click="generatePdf()">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </div>
            </form>
            </div>
                <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Registered Case</h4>
                                </div>
                                <div class="card-body">
                                    <div class="default-tab">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Individual</a>
                                                <a class="nav-item nav-link active show" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Govt & all</a>

                                            </div>
                                        </nav>
                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                            <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <table class="table">
                                                        <thead>
                                                            <tr>
                                                            <th scope="col">#Case</th>
                                                            <th scope="col">Types of Work</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Client Name</th>
                                                            <th scope="col">Contact No</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Delivery Date</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="item in cases" v-bind:key="item.id">
                                                        <td>{{ item.caseid }}</td>
                                                        <td>{{ item.typeofwork }}</td>
                                                        <td>{{ item.amount }}</td>
                                                        <td>{{ item.clientName }}</td>
                                                        <td>{{ item.contactNo }}</td>
                                                        <td>{{ item.email }}</td>
                                                        <td>{{ item.time2 }}</td>
                                                        <td><div class="btn btn-group"><button type="button" @click="editCase(item)" @change="trigger()" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button><button type="button" @click="deleteCase(item.caseid)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></div></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                             <!-- pagination -->
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <li class="page-item" v-bind:class="[{ disabled: !pagination.prev_page_url }]"><a class="page-link" href="#" @click="fetchCases(pagination.prev_page_url)">Previous</a></li>
                                                    <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                                                    <li class="page-item" v-bind:class="[{ disabled: !pagination.next_page_url }]"><a class="page-link" href="#" @click="fetchCases(pagination.next_page_url)">Next</a></li>
                                                </ul>
                                            </nav>
                                            </div>
                                            <div class="tab-pane fade active show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <table class="table">
                                                        <thead>
                                                            <tr>
                                                            <th scope="col">#Case</th>
                                                            <th scope="col">Types of Work</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Contact Person Name</th>
                                                            <th scope="col">Contact No</th>
                                                            <th scope="col">Organisation Name</th>
                                                            <th scope="col">Telephone</th>
                                                            <th scope="col">Department</th>
                                                            <th scope="col">Address</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="item in govtnallcases" v-bind:key="item.id">
                                                        <td>{{ item.caseid }}</td>
                                                        <td>{{ item.typeofwork }}</td>
                                                        <td>{{ item.amount }}</td>
                                                        <td>{{ item.contactPersonName }}</td>
                                                        <td>{{ item.contactNo }}</td>
                                                        <td>{{ item.orgName }}</td>
                                                        <td>{{ item.orgTel }}</td>
                                                        <td>{{ item.dept }}</td>
                                                        <td>{{ item.address }}</td>
                                                        <td><div class="btn btn-group"><button type="button" @click="editCase2(item)" @change="trigger()" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button><button type="button" @click="deleteCase2(item.caseid)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></div></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                             <!-- pagination -->
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <li class="page-item" v-bind:class="[{ disabled: !pagination2.prev_page_url }]"><a class="page-link" href="#" @click="fetchCases(pagination2.prev_page_url)">Previous</a></li>
                                                    <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination2.current_page }} of {{ pagination2.last_page }}</a></li>
                                                    <li class="page-item" v-bind:class="[{ disabled: !pagination2.next_page_url }]"><a class="page-link" href="#" @click="fetchCases(pagination2.next_page_url)">Next</a></li>
                                                </ul>
                                            </nav>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
        </div>

    </div>

</template>
<style>
    .options{
        position:absolute;
        display: block;
        width:90%;
        z-index:1;
    }
    .options ul {
        padding-left: 0;
        list-style-type: none;
        margin: 4px;
        display: block;
    }
    .options ul li{
        border-bottom: 1px solid lightgray;
        padding: 5px;
        cursor: pointer;
        background: #f1f1f1;
    }
</style>
<script>
import DatePicker from 'vue2-datepicker'
import jsPDF from 'jspdf';
export default {
    components: { DatePicker },
    data(){
        return {
            advamount: '',
            selected: 0,
            queryString:'',
            clientNo:'',
            visible:false,
            clientDetails:[],
            clientDetailsNo: [],
            time1: '',
            time2: '',
            time3: '',
            // custom lang
            lang: 'en',
            cases: [],
            govtnallcases: [],
            casee: {
                caseid: '',
                clientType: '',
                typeofwork: '',
                amount: '',
                clientName: '',
                contactNo: '',
                altContactNo: '',
                email: '',
                address: '',
                time2: '',
                selected: '',
                orgName: '',
                clientPersonName: '',
                personContactNo: '',
                telNo: '',
                dept: '',
                addr:'',
                advamount: '',
                rtgsNo: '',
                bankName: '',
                bankersPhone: ''
            },
            caseid: '',
            pagination: {},
            pagination2: {},
            edit: false,
            searchEdit: false,
             casee: {
                 selected: "1",
             },
            optiontypes: [
                { id: 1, name: '-Select Payment Method-'},
                { id: 2, name: 'Cash' },
                { id: 3, name: 'Cheque' },
                { id: 4, name: 'RTGS/NEFT' }
            ],
             casee: {
                 clientType: "1",
             },
                options: [
                    {id: 1, name: '-Select Client Type-'},
                    {id: 2, name: 'Individual'},
                    {id: 3, name: 'Govt'},
                    {id: 4, name: 'Pvt Ltd'},
                    {id: 5, name: 'NGO'}
                ],
        }
    },

    created(){
        this.fetchCases();
        this.showCaseId();
        this.govtnAll();
        this.status();
    },
    computed: {
        filterClientbyId: function(){
           console.log(this.cases.filter());
        }
    },
    methods:
    {
        fetchCases(page_url){
        const token = localStorage.getItem('token');
            page_url = page_url || '/api/cases?token='+token;
            let vm = this;
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.cases = res.data;
                vm.makePagination(res.meta, res.links);
            })
        },
        makePagination(meta, links){
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            }
            this.pagination = pagination;
        },
        govtnAll(pageurl){
            const token = localStorage.getItem('token');
             pageurl = pageurl || '/api/govtnallcases?token='+token;
            let vm = this;
            fetch(pageurl)
            .then(res => res.json())
            .then(res => {
                this.govtnallcases = res.data;
                vm.makePagination2(res.meta, res.links);
            })
        },
        makePagination2(meta, links){
            let pagination2 = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            }
            this.pagination2 = pagination2;
        },
        deleteCase(id){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    const token = localStorage.getItem('token');
                    fetch('/api/cases/'+id+'?token='+token, {
                        method: 'delete'
                    })
                    .then(()=>{
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        this.fetchCases();
                }).catch(()=>{
                    Swal.fire(
                        'Failed!',
                        'There was something wrong',
                        'warning'
                    )
                });
                }

            })
        },
        editCase(item){
        this.edit = true;
        this.casee.id = item.id;
        this.casee.clientType = item.clientType;
        this.casee.typeofwork = item.typeofwork;
        this.casee.amount = item.amount;
        this.casee.clientName = item.clientName;
        this.casee.contactNo = item.contactNo;
        this.casee.altContactNo = item.altContactNo;
        this.casee.email = item.email;
        this.casee.address = item.address;
        this.casee.time2 = item.time2;
        this.casee.selected = item.selected;

        if(this.casee.clientType){

        }
    },
    addCase(){
        if(this.edit === false){
            //Add Case
            const token = localStorage.getItem('token')
            this.casee.caseid = jQuery("#caseid").val();
            fetch('api/case?token=' + token, {
                method: 'post',
                body: JSON.stringify(this.casee),
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                this.casee.caseid = '';
                this.casee.clientType = '';
                this.casee.typeofwork = '';
                this.casee.amount = '';
                this.casee.clientName = '';
                this.casee.contactNo = '';
                this.casee.altContactNo = '';
                this.casee.email = '';
                this.casee.address = '';
                this.casee.time2 = '';
                this.casee.selected = ''
                    Swal.fire(
                    'Sent!',
                    'Your Project has been Saved.',
                    'success'
                    )
                this.fetchCases();
                this.showCaseId();
            var clientName = this.casee.clientName;
            var caseid = this.casee.caseid;
            var dd = this.casee.time2;
            var amount = this.casee.amount;
            var paidamount = this.casee.advamount;
            var dueamount = parseFloat(amount)-parseFloat(paidamount);
            var projectName = this.casee.typeofwork;
            var pdf = new jsPDF('p', 'pt', 'A4');
            pdf.text('ACKNOWLEDGEMENT', 250, 20);
            pdf.setDrawColor(0,0,0);
            pdf.line(40, 30, 570, 30);
            pdf.setFontSize(9);
            pdf.setFontType("bold");
            pdf.text('Case ID:', 50, 45);
            pdf.text(caseid, 120, 45);
            pdf.text('Client Name:', 50, 60);
            pdf.text(clientName, 120, 60);
            pdf.text('Delivery Date:', 250, 45);
            pdf.text(dd, 340, 45);
            pdf.text('Amount:', 250, 60);
            pdf.text(amount, 340, 60);
            pdf.text('Paid Amount:', 400, 45);
            pdf.text(paidamount.toString(), 500, 45);
            pdf.text('Due Amount:', 400, 60);
            pdf.text(dueamount.toString(), 500, 60);
            pdf.text('Project Name: ',250,80);
            pdf.text(projectName,320,80);
            pdf.setDrawColor(0,0,0);
            pdf.line(40, 90, 570, 90);
            pdf.save(caseid+'.pdf');
            })
            .catch(err => console.log(err));
        }
        else{
            //Update Case
        this.casee.caseid = jQuery("#caseid").val();
        const token = localStorage.getItem('token');
        fetch('api/case?token='+token, {
                method: 'put',
                body: JSON.stringify(this.casee),
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                this.casee.caseid = '';
                this.casee.clientType = '';
                this.casee.typeofwork = '';
                this.casee.amount = '';
                this.casee.clientName = '';
                this.casee.contactNo = '';
                this.casee.altContactNo = '';
                this.casee.email = '';
                this.casee.address = '';
                this.casee.time2 = '';
                this.casee.selected = ''
                alert('Case Updated');
                this.fetchCases();
                this.showCaseId();
            })
            .catch(err => console.log(err));
        }
    },

        editCase2(item){
        this.edit = true;
        this.casee.id = item.id;
        this.casee.clientType = item.clientType;
        this.casee.typeofwork = item.typeofwork;
        this.casee.amount = item.amount;
        this.casee.personContactNo = item.contactPersonName;
        this.casee.telNo = item.orgTel;
        this.casee.altContactNo = item.dept;
        this.casee.email = item.address;
        this.casee.time2 = item.time2;
        this.casee.selected = item.selected;

        if(this.casee.clientType){

        }
    },
    changeType(){
        console.log(this.casee.id);
    },
    populateForm(){
        console.log('Hello');
    },
    getResults(){
        this.clientDetails = [];
        if(this.queryString){
            axios.get('api/search', {params: {queryString:this.queryString}}).then(res =>  {
                res.data.forEach((clientDetail) =>  {
                    this.clientDetails.push(clientDetail);
                })
            })
        }
    },
        getPhoneNo(){
            this.clientDetailsNo = [];
            if(this.clientNo){
                axios.get('api/searchphone', {params: {clientNo:this.clientNo}}).then(res =>  {
                    res.data.forEach((Detail) =>  {
                        this.clientDetailsNo.push(Detail);
                    })
                })
            }
        },
        selectClient(details){
            this.searchEdit = true;
            this.queryString = details.clientid;
            this.clientNo= details.contactNo;
            this.casee.clientName = details.clientName;
            this.casee.contactNo = details.contactNo;
            this.casee.altContactNo = details.altContactNo;
            this.casee.email = details.email;
            this.casee.address = details.address;
            // this.visible = true;
        },
        selectClientsNo(details){
            this.searchEdit = true;

            this.queryString = details.clientid;
            this.clientNo= details.contactNo;
            this.casee.clientName = details.clientName;
            this.casee.contactNo = details.contactNo;
            this.casee.altContactNo = details.altContactNo;
            this.casee.email = details.email;
            this.casee.address = details.address;
            this.visible = false;
        },
        showCaseId(){
        const token = localStorage.getItem('token');
            fetch('api/caseid?token='+token)
                .then(res => res.json())
                .then(data => {
                    this.casee.caseid = data;
                })
        },
        status(){
            const token = localStorage.getItem('token');
            fetch('api/status?token='+token)
            .then(res => res.json())
            .then((res) => {
                console.log(res)
            })
        }
        // generatePdf(){
        //     var clientName = this.casee.clientName;
        //     var caseid = this.casee.caseid;
        //     var dd = this.casee.time2;
        //     var amount = this.casee.amount;
        //     var paidamount = this.casee.advamount;
        //     var dueamount = parseFloat(amount)-parseFloat(paidamount);
        //     var projectName = this.casee.typeofwork;
        //     var pdf = new jsPDF('p', 'pt', 'A4');
        //     pdf.text('ACKNOWLEDGEMENT', 250, 20);
        //     pdf.setDrawColor(0,0,0);
        //     pdf.line(40, 30, 570, 30);
        //     pdf.setFontSize(9);
        //     pdf.setFontType("bold");
        //     pdf.text('Case ID:', 50, 45);
        //     pdf.text(caseid, 120, 45);
        //     pdf.text('Client Name:', 50, 60);
        //     pdf.text(clientName, 120, 60);
        //     pdf.text('Delivery Date:', 250, 45);
        //     pdf.text(dd, 340, 45);
        //     pdf.text('Amount:', 250, 60);
        //     pdf.text(amount, 340, 60);
        //     pdf.text('Paid Amount:', 400, 45);
        //     pdf.text(paidamount.toString(), 500, 45);
        //     pdf.text('Due Amount:', 400, 60);
        //     pdf.text(dueamount.toString(), 500, 60);
        //     pdf.text('Project Name: ',250,80);
        //     pdf.text(projectName,320,80);
        //     pdf.setDrawColor(0,0,0);
        //     pdf.line(40, 90, 570, 90);
        //     pdf.save(caseid+'.pdf');
        // }
    }
}
</script>
