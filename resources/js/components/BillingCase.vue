<template>
    <div class="container-fluid">
        <search v-if="this.searchResult"></search>
        <div v-if="!this.searchResult">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Billing Case</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Billing Case</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Billing Case</strong>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#Case</th>
                                <th scope="col">Assigned Employee</th>
                                <th scope="col">Helper</th>
                                <th scope="col">Final Docs By Employee</th>
                                <th scope="col">Assigned Docs by Admin</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tr v-for="(item, i) in completedcases" :key="i">
                            <td>{{ item.caseid }}</td>
                            <td><input type="hidden" :value="item.employee_id">{{ item.name }}</td>
                            <td>{{ item.helper }}</td>
                            <td></td>
                            <td><a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></td>
                            <td></td>
                            <td>
                                <div class="btn btn-group">
                                <button type="button" class=" btn btn-primary" data-toggle="modal" :data-target="'#exampleModal'+item.caseid">FP</button>
                                <button type="button" class=" btn btn-warning" data-toggle="modal" :data-target="'#exampleModals'+item.caseid">Credit</button>
                                </div>
                            </td>
        <!-- Modal -->
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
                    <button type="submit" class="btn btn-primary" @click="print">Print</button>
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
</div>

</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
// var converter = require("number-to-words");
export default {

        data(){
            var converter = require('number-to-words');
            Vue.filter('toWords', function (value) {
            if (!value) return '';
            return converter.toWords(value);
            })
        return {
            searchResult: '',
            lessadvance: '',
            value: null,
            numbers: '',
            time1: '',
            time2: '',
            time3: '',
            // custom lang
            lang: 'en',
            myDate : new Date().toISOString().slice(0,10),
            completedcases: [],

        }
    },
    created(){
        this.fetchCases();
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

        fetchCases(page_url){
            const token = localStorage.getItem('token');
            page_url = page_url || 'api/completedcases?token='+token;
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
        }
    }
}
</script>
