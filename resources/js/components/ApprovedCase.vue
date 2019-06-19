<template>
    <div class="container-fluid">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Approved Case</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Approved Case</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Approved Case</strong>
                    </div>
                    <div class="card-body">
                    <table class="table" v-if="users.selected == 0">
                        <thead>
                            <tr>
                                <th scope="col">#Case</th>
                                <th scope="col">Assigned Employee</th>
                                <th scope="col">Helper</th>
                                <th scope="col">Case docs</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tr v-for="(item, i) in completedcases" :key="i">
                            <td>{{ item.caseid }}</td>
                            <td><input type="hidden" :value="item.employee_id">{{ item.name }}</td>
                            <td>{{ item.helper }}</td>
                            <td><button type="button" class="btn btn-sm" data-toggle="modal" :data-target="'#exampleModals1'+item.caseid" @click="showFile(item)"><i class="fa fa-file"></i></button></td>
                            <td><a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></td>
                            <td></td>
                            <td><button type="button" class=" btn btn-primary" data-toggle="modal" :data-target="'#exampleModal'+item.caseid">Rise Bill</button></td>
        <!-- Modal -->
            <div class="modal fade" :id="'exampleModals1'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Documents</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Docs</th>
                            <th>Admin docs</th>
                        </tr>
                        <tr>
                            <td>
                                <ul>
                                    <li v-for="data in files" v-bind:key="data.id"><a :href="'./storage/'+item.caseid+'/'+data.docs" download>{{ data.docs }}</a></li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li> <a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" :id="'exampleModal'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tax Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <div class="modal-body" id=tax_invoice>
            <div id="page-wrap">

		<div id="header1">TAX INVOICE</div>

		<span style="font-size: 12px; font-weight:800;">Name & Address of Service Provider:</span>
		<div id="identity">
            <div id="address">D. Das & Associates: Chartered Accountants: 1st Floor, Hotel Utsav Building Above Book Stall, Jail Road, Shillong-793001</div>

            <table id="meta">
            	 <tr>
                    <td class='meta-head'>GSTIN:</td>
                    <td><input type="text" readonly id="gstin" value="17AAJFD4695B1ZE"></td>
                </tr>
                <tr>
                    <td class="meta-head">CASE ID:</td>
                    <td><input type="text" readonly id="invoice_no" v-model="item.caseid"></td>
                </tr>
                <tr>
                    <td class="meta-head">INVOICE NO:</td>
                    <td><input type="text" readonly id="invoice_no" v-model="item.invoiceNo"></td>
                </tr>
                <tr>
                    <td class="meta-head">INVOICE DATE:</td>
                    <td><input type="text" id="date" v-model="myDate"></td>
                </tr>
            </table>
		<!-- <div style="clear:both"></div> -->
		<table style="width: 900px;">
			<tr>
				<td width="10%">
						<span style="font-size: 18px; font-weight:800;">Bill To:</span>
				</td>
				<td width="90%">
					<div id="customer">
			            <textarea rows="4" cols="40" id="customer-title" class="bill_to" v-model="item.address"></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="text" name="randomText" id="randomText" placeholder="Give information" size="100">
				</td>
			</tr>
			<tr>
				<td colspan="2">
							GSTIN: <input type="text" name="gstinText" id="gstinText" placeholder="GSTIN" size="45">
				</td>
			</tr>
		</table>
		<table id="items">
		  <tr>
		  	<th>Sl.No</th>
		      <th >SAC</th>
		      <th>Description</th>
		      <th >Period Of Service</th>
		      <th>Amount(Rs)</th>
		  </tr>
		  <tr class="item-row" id="row1">
		  	  <td>1</td>
		      <td ><div style="text-align: center;"><input type="text" value="998221" id="sac1"></div><a class="delete" id="delete" href="javascript:;" title="Remove row"><img src="images/cross.png" width="12px"></a></td>
		      <td ><input type="text" class="description requiredField" v-model="item.typeofwork" id="description1"></td>
		      <td ><input type="text" class="pos requiredField" v-model="item.time2" id="pos1"></td>
		      <td>{{ amount = parseFloat(item.amount) }}</td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td class="total-line">Taxable Value:</td>
		      <td align="center">(A)</td>
		      <td class="taxabale_value">{{ amount }}</td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td class="total-line">SGST: <input id="sgstRate" type="text" value="9" style="width: 15px"><span>%</span></td>
		      <td align="center">(B)</td>
		      <td class="total-value">{{ a = amount* parseFloat(0.09) }}</td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td class="total-line">CGST: <input id="cgstRate" type="text" value="9" style="width: 15px" onkeypress="return isNumberKey(event,this)"><span>%</span></td>
		      <td align="center">(C)</td>
		      <td class="total-value">{{ b = amount* parseFloat(0.09) }}</td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td class="total-line">Total Tax</td>
		      <td align="center">(D)(B+C)</td>
		      <td class="total-value">{{ c = a + b }}</td>
		  </tr>
		  <tr>
		  	<td colspan="2">Invoice Value(in words)</td>
		  	<td><span>{{ d = amount + c | toWords | capitalize }} Rupees Only</span></td>
		      <td class="total-line" colspan="3">Total Invoice Amount</td>
		  </tr>
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="1" class="total-line balance">(A+D)</td>
		      <td class="total-value balance">{{ d }}</td>
		  </tr>
		   <tr>
		  	<td rowspan="3" colspan="2">Net Invoice Value(in words)</td>
		  	<td rowspan="3"><span>{{ d-parseFloat(item.advamount) | toWords | capitalize }} Rupees Only</span></td>
		      <td class="total-line">Less: Advance</td>
		      <td>{{ advamount = item.advamount }}</td>
		  </tr>
		  <tr>
		  	<td class="total-line">AV No.</td>
		  	<td><input type="text" name="avNo" id="avNo" placeholder="AV No."></td>
		  </tr>
		  <tr>
		  	<td class="total-line">Net Invoice Amount</td>
		  	<td>{{ d-parseFloat(advamount) }}</td>
		  </tr>

		</table>
		<br>
	</div>
</div>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" @click="print(item)">Save & Print</button>
                </div>
                </div>
            </div>
        </div>
                        </tr>
                    <tbody>

                </tbody>
            </table>
                    <table class="table" v-else-if="users.selected == 1">
                        <thead>
                            <tr>
                                <th scope="col">#Case</th>
                                <th scope="col">Assigned Employee</th>
                                <th scope="col">Helper</th>
                                <th scope="col">Case docs</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tr v-for="(item, i) in completedcases" :key="i">
                            <td>{{ item.caseid }}</td>
                            <td><input type="hidden" :value="item.employee_id">{{ item.name }}</td>
                            <td>{{ item.helper }}</td>
                            <td><button type="button" class="btn btn-sm" data-toggle="modal" :data-target="'#exampleModals1'+item.caseid" @click="showFile(item)"><i class="fa fa-file"></i></button></td>
                            <td><a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></td>
                            <td></td>
                            <td><button type="button" class=" btn btn-primary" data-toggle="modal" :data-target="'#exampleModal'+item.caseid">Rise Bill</button></td>
        <!-- Modal -->
            <div class="modal fade" :id="'exampleModals1'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Documents</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Docs</th>
                            <th>Admin docs</th>
                        </tr>
                        <tr>
                            <td>
                                <ul>
                                    <li v-for="data in files" v-bind:key="data.id"><a :href="'./storage/'+item.caseid+'/'+data.docs" download>{{ data.docs }}</a></li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li> <a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" :id="'exampleModal'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tax Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <div class="modal-body" id=tax_invoice>
            <div id="page-wrap">

		<div id="header1">TAX INVOICE</div>

		<span style="font-size: 12px; font-weight:800;">Name & Address of Service Provider:</span>
		<div id="identity">
            <div id="address">D. Das & Associates: Chartered Accountants: 1st Floor, Hotel Utsav Building Above Book Stall, Jail Road, Shillong-793001</div>

            <table id="meta">
            	 <tr>
                    <td class='meta-head'>GSTIN:</td>
                    <td><input type="text" readonly id="gstin" value="17AAJFD4695B1ZE"></td>
                </tr>
                <tr>
                    <td class="meta-head">CASE ID:</td>
                    <td><input type="text" readonly id="invoice_no" v-model="item.caseid"></td>
                </tr>
                <tr>
                    <td class="meta-head">INVOICE NO:</td>
                    <td><input type="text" readonly id="invoice_no" v-model="item.invoiceNo"></td>
                </tr>
                <tr>
                    <td class="meta-head">INVOICE DATE:</td>
                    <td><input type="text" id="date" v-model="myDate"></td>
                </tr>
            </table>
		<!-- <div style="clear:both"></div> -->
		<table style="width: 900px;">
			<tr>
				<td width="10%">
						<span style="font-size: 18px; font-weight:800;">Bill To:</span>
				</td>
				<td width="90%">
					<div id="customer">
			            <textarea rows="4" cols="40" id="customer-title" class="bill_to" v-model="item.address"></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="text" name="randomText" id="randomText" placeholder="Give information" size="100">
				</td>
			</tr>
			<tr>
				<td colspan="2">
							GSTIN: <input type="text" name="gstinText" id="gstinText" placeholder="GSTIN" size="45">
				</td>
			</tr>
		</table>
		<table id="items">
		  <tr>
		  	<th>Sl.No</th>
		      <th >SAC</th>
		      <th>Description</th>
		      <th >Period Of Service</th>
		      <th>Amount(Rs)</th>
		  </tr>
		  <tr class="item-row" id="row1">
		  	  <td>1</td>
		      <td ><div style="text-align: center;"><input type="text" value="998221" id="sac1"></div><a class="delete" id="delete" href="javascript:;" title="Remove row"><img src="images/cross.png" width="12px"></a></td>
		      <td ><input type="text" class="description requiredField" v-model="item.typeofwork" id="description1"></td>
		      <td ><input type="text" class="pos requiredField" v-model="item.time2" id="pos1"></td>
		      <td>{{ amount = parseFloat(item.amount) }}</td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td class="total-line">Taxable Value:</td>
		      <td align="center">(A)</td>
		      <td class="taxabale_value">{{ amount }}</td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td class="total-line">SGST: <input id="sgstRate" type="text" value="9" style="width: 15px"><span>%</span></td>
		      <td align="center">(B)</td>
		      <td class="total-value">{{ a = amount* parseFloat(0.09) }}</td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td class="total-line">CGST: <input id="cgstRate" type="text" value="9" style="width: 15px" onkeypress="return isNumberKey(event,this)"><span>%</span></td>
		      <td align="center">(C)</td>
		      <td class="total-value">{{ b = amount* parseFloat(0.09) }}</td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td class="total-line">Total Tax</td>
		      <td align="center">(D)(B+C)</td>
		      <td class="total-value">{{ c = a + b }}</td>
		  </tr>
		  <tr>
		  	<td colspan="2">Invoice Value(in words)</td>
		  	<td><span>{{ d = amount + c | toWords | capitalize }} Rupees Only</span></td>
		      <td class="total-line" colspan="3">Total Invoice Amount</td>
		  </tr>
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="1" class="total-line balance">(A+D)</td>
		      <td class="total-value balance">{{ d }}</td>
		  </tr>
		   <tr>
		  	<td rowspan="3" colspan="2">Net Invoice Value(in words)</td>
		  	<td rowspan="3"><span v-if="item.advamount == null">{{ d-parseFloat(0) | toWords | capitalize }} Rupees Only</span><span v-else>{{ d-parseFloat(item.advamount) | toWords | capitalize }} Rupees Only</span></td>
		      <td class="total-line">Less: Advance</td>
		      <td><span v-if="item.advamount == null">{{ parseFloat(0.00) }}</span><span v-else>>{{ advamount = item.advamount }}</span></td>
		  </tr>
		  <tr>
		  	<td class="total-line">AV No.</td>
		  	<td><input type="text" name="avNo" id="avNo" placeholder="AV No."></td>
		  </tr>
		  <tr>
		  	<td class="total-line">Net Invoice Amount</td>
		  	<td><span v-if="item.advamount == null">{{ d-parseFloat(0.00) }}</span><span v-else>{{ d-parseFloat(advamount) }}</span></td>
		  </tr>

		</table>
		<br>
	</div>
</div>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" @click="print(item)">Save & Print</button>
                </div>
                </div>
            </div>
        </div>
                        </tr>
                    <tbody>

                </tbody>
            </table>
                    <table class="table" v-if="users.selected == 2">
                        <thead>
                            <tr>
                                <th scope="col">#Case</th>
                                <th scope="col">Assigned Employee</th>
                                <th scope="col">Helper</th>
                                <th scope="col">Assigned Docs by Admin</th>
                                <th scope="col">Final Docs By Employee</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tr v-for="(item, i) in approvedcaseemp" :key="i">
                            <td>{{ item.caseid }}</td>
                            <td><input type="hidden" :value="item.employee_id">{{ item.name }}</td>
                            <td>{{ item.helper }}</td>
                            <td></td>
                            <td><a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></td>
                            <td></td>
                            <td><div class="alert alert-primary alert-sm">Approved</div></td>
        <!-- Modal -->
        <div class="modal fade" :id="'exampleModal'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reason for Rejection</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="pushToApproved(item.caseid)">
                <div class="modal-body">
                    <table class="table table-resonsive table-bordered">
                        <tr>
                            <thead>Remarks</thead>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
                </div>
            </div>
        </div>

                        </tr>
                    <tbody>

                </tbody>
            </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
export default {
        data(){
            var converter = require('number-to-words');
            Vue.filter('toWords', function (value) {
            if (!value) return '';
            return converter.toWords(value);
            })
        return {
            invoiceNo:[],
            value: null,
            time1: '',
            time2: '',
            time3: '',
            // custom lang
            lang: 'en',
            files: [],
            completedcases: [],
            approvedcaseemp: [],
            myDate : new Date().toISOString().slice(0,10),
            users: {
            email: '',
            selected: ''
            },
            toBill: {
                caseid: '',
                employee_id: '',
                invoiceNo: ''
            }
        }
    },
    created(){
        this.fetchCases();
        this.fetchApprovedCaseEmployee();
        this.fetchUser();
        this.invoice();
        // this.loadEmployee();
        // console.log(this.$refs)
        // console.log(field);
    },
    methods: {
        fetchCases(page_url){
            const token = localStorage.getItem('token');
            page_url = page_url || 'api/completedcases?token='+token;
            let vm = this;
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.completedcases = res.data;
                console.log(res.data)
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
        fetchApprovedCaseEmployee(){
            const token = localStorage.getItem('token');
            fetch('api/approvedcaseemployee?token='+token)
            .then(res => res.json())
            .then(res => {
                this.approvedcaseemp = res.data;
            })
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
        loadEmployee(){
             axios.get("api/employees").then(( { data }) => (this.employees = data.data) );
        },
        processFile(e) {

            var fileReader = new FileReader();

            fileReader.readAsDataURL(e.target.files[0]);

            fileReader.onload = (e) => {
                this.toEmployee.docs = e.target.result
            }
            this.toEmployee.fileName = e.target.files[0].name
        },
        sendToEmployee(id){
            this.toEmployee.caseid = id;
            fetch(`api/sendemployee`, {
                method: 'post',
                body: JSON.stringify(this.toEmployee),
                    headers: {
                'content-type': 'application/json'
                }
            })
        },
        confirmApprove(item){
            Swal.fire({
            title: 'Do you want to Approve?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Approve it!'
            }).then((result) => {
                if (result.value) {
                    this.toApproval.caseid = item.caseid;
                    this.toApproval.employee_id = item.employee_id;
                    fetch(`api/sendapproval`, {
                    method: 'post',
                    body: JSON.stringify(this.toApproval),
                        headers: {
                    'content-type': 'application/json'
                    }
            })
            .then(res => res.json())
            .then(res => {
                this.toApproval.caseid = '';
                this.toApproval.employee_id = '';
                jQuery('#exampleModal'+this.toApproval.caseid).modal('hide');
            })
            .then(Swal.fire(
                'Approved!',
                'Case Has been Successfully Approved!',
                'success'
            ))
            .catch(err => console.log(err))
                }

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
        print(item){

            Swal.fire({
            title: 'Do you want to Rise bill?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yo, killin it!'
            }).then((result) => {
                if (result.value) {
                     window.print();
                    const token = localStorage.getItem('token');
                    this.toBill.caseid = item.caseid;
                    this.toBill.employee_id = item.employee_id;
                    this.toBill.invoiceNo = item.invoiceNo;


                    fetch('api/tobill?token='+token, {
                    method: 'post',
                    body: JSON.stringify(this.toBill),
                    headers: {
                        'content-type': 'application/json'
                        }
                    })
                    fetch(`api/deleteapprovedcase/${item.caseid}?token=`+token, {
                        method: 'delete'
                    })
                    jQuery('#exampleModal'+item.caseid).modal('hide');
                }
            })
            .then(res => res.json())
            .then(res => {
                Swal.fire(
                'Approved!',
                'Case Has been Successfully Approved!',
                'success'
            )
                jQuery('#exampleModal'+this.toApproval.caseid).modal('hide');
            })
            .catch(err => console.log(err))

        },
        invoice(){
            const token = localStorage.getItem('token');
            fetch('api/invoice?token='+token)
            .then(res => res.json())
            .then((res) => {
                console.log(res.data)
                this.invoiceNo = res.data
            })

        },
        showFile(item){
            const token = localStorage.getItem('token');
             fetch('api/showuploadedfile/'+item.caseid+'?token='+token)
                .then(res=> res.json())
                .then(res => {
                   this.files = res
                })
        }

    },
    filters: {
            capitalize: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        }
}
</script>
