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
                                <select name="clientType" class="form-control" v-model="casee.clientType" v-on:triggerChange="changeType" >
                                    <option v-for="option in options" v-bind:value="option.id">{{ option.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" id="typeofwork" name="typeofwork" placeholder="Type of work" class="form-control" v-model="casee.typeofwork">
                        </div>
                        <div class="form-group">
                            <date-picker name="time2" v-model="casee.time2" :lang="lang"></date-picker>
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
                                <!-- Credit Card -->
                                <div >
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
                                                    <input name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 500
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 200
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input  name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 100
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 50
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 20
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 10
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input name="den_amt" type="number" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <i class="fa fa-inr"></i> 5
                                                </div>
                                                <div class="col-md-2">X</div>
                                                <div class="col-md-5">
                                                    <input name="den_amt" type="number" class="form-control input-sm">
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
                        <div class="card"  v-if="casee.selected == 4">
                            <div class="card-header">
                                <strong class="card-title">RTGS/NEFT</strong>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input name="name" type="number" class="form-control" placeholder="RTGS/NEFT No">
                                            </div>
                                            <div class="form-group has-success">
                                                <input name="no" type="text" class="form-control" placeholder="Bank Name">
                                            </div>
                                            <div class="form-group">
                                                <input name="altno" type="text" class="form-control" placeholder="Phone no">
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
                            <div >
                                <div class="card-body">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="personname" type="text" class="form-control" placeholder="Conatact Person Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <input id="percontactNo" name="percontactNo" type="text" class="form-control" placeholder="Conatct No">
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="organisationname" type="text" class="form-control" placeholder="Organisation Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <input name="organisationtelno" type="text" class="form-control" placeholder="Organisation Tel No">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <input name="altno" type="text" class="form-control" placeholder="Department">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <textarea name="organisationaddr" type="text" class="form-control" placeholder="Organisation Address"></textarea>
                                        </div>
                                    </div>

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
                                            <input  name="altno" type="text" class="form-control" placeholder="Department">
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
                                                <input name="personname" type="text" class="form-control" placeholder="Conatact Person Name" v-model="casee.clientName">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input id="pcontactNo" name="pcontactNo" type="text" class="form-control" placeholder="Conatct No" v-model="casee.contactNo">
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="organisationname" type="text" class="form-control" placeholder="Organisation Name" v-model="casee.orgName">
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
                                                        <li v-for="(detail, index) in clientDetails" v-show="!visible" @click="selectClient(detail)" v-text="detail.clientid" @keydown.enter="detail.clientid">{{ detail.clientid }}</li>
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
                                                <input id="clientName" name="clientName" type="text" class="form-control" placeholder="Client's Name" v-model="casee.clientName">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input id="contactNo" name="contactNo" type="text" class="form-control" placeholder="Contact No" v-model="casee.contactNo">
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="altContactNo" name="altContactNo" type="text" class="form-control" placeholder="Alternate Contact No" v-model="casee.altContactNo">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" v-model="casee.email">
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
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                            </div>
                        </div>

            </form>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Registered Case</strong>
                    </div>
                    <div class="card-body">
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
                        <td><button type="button" @click="editCase(item)" @change="trigger()" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button><button type="button" @click="deleteCase(item.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                    </tr>
                </tbody>
            </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item" v-bind:class="[{ disabled: !pagination.prev_page_url }]"><a class="page-link" href="#" @click="fetchCases(pagination.prev_page_url)">Previous</a></li>
                 <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                <li class="page-item" v-bind:class="[{ disabled: !pagination.next_page_url }]"><a class="page-link" href="#" @click="fetchCases(pagination.next_page_url)">Next</a></li>
            </ul>
        </nav>
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
export default {
    components: { DatePicker },
    data(){
        return {
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
            },
            caseid: '',
            pagination: {},
            edit: false,
            searchEdit: false,
            selected: "1",
            optiontypes: [
                { id: 1, name: 'Select Payment Method'},
                { id: 2, name: 'Cash' },
                { id: 3, name: 'Cheque' },
                { id: 4, name: 'RTGS/NEFT' }
            ],
             clientType: "1",
                options: [
                    {id: 1, name: 'Select client type'},
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
    },
    computed: {

        filterClientbyId: function(){
           console.log(this.cases.filter());
        }
    }
    ,
    methods: {
        fetchCases(page_url){
            page_url = page_url || 'api/cases';
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
                    fetch(`api/case/${id}`, {
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
    addCase(){
        if(this.edit === false){
            //Add Case
            this.casee.caseid = jQuery("#caseid").val();
            fetch('api/case', {
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
            })
            .catch(err => console.log(err));
        }
        else{
            //Update Case
        this.casee.caseid = jQuery("#caseid").val();
        fetch('api/case', {
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
            fetch('api/caseid')
                .then(res => res.json())
                .then(data => {
                    this.casee.caseid = data;
                })
        }
    }
}
</script>
