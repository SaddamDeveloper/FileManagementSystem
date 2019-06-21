<template>
    <div class="container-fluid">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Billed Case</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Billed Case</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Billed Case</strong>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#Case</th>
                                <th scope="col">Assigned Employee</th>
                                <th scope="col">Helper</th>
                                <th scope="col">Case Docs</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tr v-for="(item, i) in completedcases" :key="i">
                            <td>{{ item.caseid }}</td>
                            <td><input type="hidden" :value="item.employee_id">{{ item.name }}</td>
                            <td>{{ item.helper }}</td>
                            <td></td>
                            <td><button type="button" class="btn btn-sm" data-toggle="modal" :data-target="'#exampleModals1'+item.caseid" @click="showFile(item)"><i class="fa fa-file"></i></button></td>
                            <td>
                                <div class="btn btn-group">
                                <button type="button" class=" btn btn-primary" data-toggle="modal" :data-target="'#exampleModal'+item.caseid">Paid</button>
                                <button type="button" class=" btn btn-warning" data-toggle="modal" :data-target="'#exampleModals'+item.caseid">Credit</button>
                                </div>
                            </td>
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
        <div class="row">
            <div class="col-md-3">
            <textarea class="form-control" readonly v-model="namenaddress"></textarea>
            </div>
        </div>

            <table id="meta">
                <tr>
                    <td class='meta-head'>GSTIN:</td>
                    <td><input type="text" readonly id="gstin" v-model="gstIn"></td>
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
                <td class="total-value">{{ a = amount* parseFloat(0.09) | todigit }}</td>
            </tr>
            <tr>
                <td colspan="2" class="blank"> </td>
                <td class="total-line">CGST: <input id="cgstRate" type="text" value="9" style="width: 15px" onkeypress="return isNumberKey(event,this)"><span>%</span></td>
                <td align="center">(C)</td>
                <td class="total-value">{{ b = amount* parseFloat(0.09) | todigit }}</td>
            </tr>
            <tr>
                <td colspan="2" class="blank"> </td>
                <td class="total-line">Total Tax</td>
                <td align="center">(D)(B+C)</td>
                <td class="total-value">{{ c = a + b | todigit }}</td>
            </tr>
            <tr>
                <td colspan="2">Invoice Value(in words)</td>
                <td><span>{{ d = amount - c | toWords | capitalize }} Rupees Only</span></td>
                <td class="total-line" colspan="3">Total Invoice Amount</td>
            </tr>
            <tr>
                <td colspan="3" class="blank"> </td>
                <td colspan="1" class="total-line balance">(A-D)</td>
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
                <td>{{ f = d-parseFloat(advamount) | todigit }}</td>
            </tr>

		</table>
		<br>
	</div>
</div>
        </div>
                <div class="container">
                    <div class="row mb-4">
                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control" v-model="paymentmode.selected">
                                <option disabled value="">-Select Payment Mode-</option>
                                <option value="1">Cash</option>
                                <option value="2">Cheque</option>
                                <option value="3">RTGS/NEFT</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-10">
                    <div class="row" v-if="paymentmode.selected == 1">
                        <div class="col-md-3">
                            <input type="date" v-model="myDate" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <span>Amount: {{ f }}</span>
                        </div>
                         <div class="col-md-6">
                             <button class="btn btn-primary" type="button" @click="pay(item)" v-on:click="isPaid = !isPaid">Pay</button>
                             <div class="btn-group" v-if="isPaid==true">
                                <button type="submit" class="btn btn-primary" @click="print">Print</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             </div>
                        </div>
                    </div>
                    <div class="row" v-if="paymentmode.selected == 2">
                        <div class="col-md-3">
                            <input type="date" v-model="myDate" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" v-model="chequeNo" placeholder="Cheque No">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" placeholder="Bank Name" v-model="bankNamec">
                        </div>
                        <div class="col-md-2">
                            <span>Amount: {{ f }}</span>
                        </div>
                        <div class="col-md-2 mb-2">
                             <button class="btn btn-primary" type="button" @click="pay(item)" v-on:click="isPaid = !isPaid">Pay</button>
                                <div class="btn-group" v-if="isPaid==true">
                                <button type="submit" class="btn btn-primary" @click="print">Print</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             </div>
                        </div>
                    </div>
                    <div class="row" v-if="paymentmode.selected == 3">
                        <div class="col-md-3">
                            <input type="date" v-model="myDate" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text"  class="form-control" v-model="BankName" placeholder="Bank Name">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="" id="" v-model="transactionNo" class="form-control" placeholder="Transaction No">
                        </div>
                        <div class="col-md-2">
                            <span>Rs: {{ f }}</span>
                        </div>
                        <div class="col-md-2">
                           <button class="btn btn-primary" type="button" @click="pay(item)" v-on:click="isPaid = !isPaid">Pay</button>
                             <div class="btn-group" v-if="isPaid==true">
                                <button type="submit" class="btn btn-primary" @click="print">Print</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             </div>
                        </div>
                    </div>

                    </div>
                    </div>

                </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" :id="'exampleModals'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tax Invoice (Credit)</h5>
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
                    <td><input type="text" readonly id="invoice_no"></td>
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
                    <button type="submit" class="btn btn-primary" @click="print">Save & Print</button>
                </div>
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
import jsPDF from 'jspdf';
import 'jspdf-autotable';
export default {
        data(){
            var converter = require('number-to-words');
            Vue.filter('toWords', function (value) {
            if (!value) return '';
            return converter.toWords(value);
            })
        return {
            namenaddress: 'D. Das & Associates: Chartered Accountants: 1st Floor, Hotel Utsav Building Above Book Stall, Jail Road, Shillong-793001',
            invoiceNo: '',
            chequeNo: '',
            bankNamec:'',
            transactionNo: '',
            files: [],
            BankName: '',
            isDisabled: false,
            isPaid: false,
            selected: "0",
            paymentmode:{
                selected: ''
            },
            lessadvance: '',
            value: null,
            numbers: '',
            time1: '',
            time2: '',
            time3: '',
            // custom lang
            lang: 'en',
            gstIn: '17AAJFD4695B1ZE',
            myDate : new Date().toISOString().slice(0,10),
            completedcases: [],
            toComplete: {
                paidamount: '',
                caseid: '',
                employee_id: '',
                selected: '',
                date: '',
                transactionNo: '',
                BankName: '',
                chequeNo: '',
                bankNamec: '',
                gstAmount: ''
            }
        }
    },
    created(){
        this.fetchCases();
        this.invoice();
    },

    methods: {

        fetchCases(page_url){
            const token = localStorage.getItem('token');
            page_url = page_url || 'api/billedcase?token='+token;
            let vm = this;
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.completedcases = res.data;
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
        print(){
            window.print();
        },
        pay(item){
            console.log(item);
            this.toComplete.paidamount = ((parseFloat(2*item.amount* 0.09) + parseFloat(item.amount)-parseFloat(item.advamount))).toFixed(2);
            this.toComplete.gstAmount = parseFloat(2*item.amount * 0.09).toFixed(2);
            this.toComplete.caseid = item.caseid;
            this.toComplete.employee_id = item.employee_id;
            this.toComplete.selected = this.paymentmode.selected;
            this.toComplete.date = this.myDate;
            this.toComplete.transactionNo = this.transactionNo;
            this.toComplete.BankName = this.BankName;
            this.toComplete.chequeNo = this.chequeNo;
            this.toComplete.bankNamec = this.bankNamec;
            const token = localStorage.getItem('token');
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Pay it!'
            }).then((result) => {
                if(result.value){
                    var pdf = new jsPDF('p', 'pt', 'A4');
                    var bill_to = item.address;
                    // var invoice_no = $('#invoice_no').val();
                    var date = this.myDate;
                    var gstin = this.gstIn;
                    var amount = item.amount;
                    var sgst = amount * 0.09;
                    var cgst = amount * 0.09;
                    var gst = sgst + cgst;
                    var amount1 = parseFloat(amount) + parseFloat(gst);
                    var advance = item.advamount;
                    var finalAmount = amount1-advance;
                    var address = this.namenaddress;
                    pdf.text('RECEIPT', 250, 20);
                    pdf.setFontSize(9);
                    pdf.setFontType("bold");
                    pdf.text('Name & Address of Service Provider:', 50, 40);
                    var formatedAddress = pdf.splitTextToSize(address, 180);
                    pdf.text(formatedAddress, 50, 50);
                    pdf.text('Received with Thanks from ' + bill_to, 50, 110);
                    pdf.text('With Rupees: ' + finalAmount + ' by Cash/RTGS/NEFT/Credit', 50, 130);
                    pdf.autoTable({
                            head: [['GSTIN', 'DATE', 'AMOUNT', 'ADVANCE']],
                            body: [
                                [gstin, date, finalAmount, advance]
                            ],
                            margin: {right:60,left:50, top:140},
                        });
                    pdf.save(item.caseid+'.pdf');
                    fetch('api/paymentbycash?token='+token, {
                        method: 'post',
                        body: JSON.stringify(this.toComplete),
                            headers: {
                        'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then((res => {
                        if(res.message == 0){
                            Swal.fire(
                            'Success!',
                            'Payment Successfull',
                            'success'
                            )
                        }
                        else if(res.message == 1){
                            Swal.fire(
                            'Sorry!',
                            'You have already paid',
                            'warning'
                            )
                        }
                        else if(res.message == 2){
                           Swal.fire(
                            'Sorry!',
                            'You have already paid',
                            'warning'
                            )
                        }
                        else{
                             Swal.fire(
                                'Failed!',
                                'There was something wrong',
                                'warning'
                            )
                        }
                    }))
                }

            })
        },
        invoice(){
            const token = localStorage.getItem('token');
            fetch('api/invoice?token='+token)
            .then(res => res.json())
            .then((res) => {
                console.log(res)
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
    computed: {
        total: function(){
                return this.$refs.taxable_value;
        }
    },
    filters: {
        capitalize: function (value) {
            if (!value) return ''
            value = value.toString()
            return value.charAt(0).toUpperCase() + value.slice(1)
        },
        todigit: function(value){
            if(!value) return ''
            return value.toFixed(2)
        }
    }
}
</script>
