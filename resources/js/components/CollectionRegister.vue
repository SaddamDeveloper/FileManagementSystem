<template>
    <div class="container-fluid">
        <search v-if="this.searchResult"></search>
        <div v-if="!this.searchResult">
            <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Collection Register</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Collection Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
                <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Collection</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered ">
                              <thead>
                                <tr>
                                  <th scope="col">CaseID</th>
                                  <th scope="col">Client</th>
                                  <th scope="col">Invoice No</th>
                                  <th scope="col">Amount</th>
                                  <th scope="col">GST</th>
                                  <th scope="col">Payment Mode</th>
                              </tr>
                          </thead>
                          <tbody>
                            <tr v-for="item in collectionregister" v-bind:key="item.caseid">
                              <td>{{ item.caseid }}</td>
                              <td>{{ item.clientName }}</td>
                              <td></td>
                              <td>{{ item.paidamount }}</td>
                              <td>{{ item.gstamount }}</td>
                              <td>{{ item.name }}</td>
                          </tr>
                      </tbody>
                      <tfoot>
                      </tfoot>
                          <th colspan="3">Grand Total</th>
                          <th>{{ OveralltotalAmount }}</th>
                          <th colspan="2">{{ OverallgstAmount }}</th>
                  </table>


                  <div class="row">
                    <div class="col-md-6 alert alert-success">
                        <h3 class="text-center">Collection Report</h3><hr>
                        <table>

                            <tr>
                                <td>
                                    Today's Collection By Cash:
                                </td>
                                <td><b>{{ c = TodaysTotalAmountByCash }}</b></td>
                            </tr>
                            <tr>
                                <td>
                                    Today's Collection By Cheque:
                                </td>
                                <td><b>{{ ch = TodaysTotalAmountByCheque }}</b></td>
                            </tr>
                            <tr>
                                <td>
                                    Today's Collection By NEFT/RTGS:
                                </td>
                                <td><b> {{ r = TodaysTotalAmountByRtgs }} </b></td>
                            </tr>

                            <tr>
                                <td>
                                     Today's Overall Total Collection:
                                </td>
                                <td><b>{{ t = OveralltotalAmount }}</b></td>
                            </tr>
                            <tr>
                                <td>
                                    Today's GST Collection By Cash:
                                </td>
                                <td><b>{{ c * 0.18 }}</b></td>
                            </tr>
                            <tr>
                                <td>
                                    Today's GST Collection By Cheque:
                                </td>
                                <td><b>{{ ch * 0.18 }}</b></td>
                            </tr>
                            <tr>
                                <td>
                                    Today's GST Collection By NEFT/RTGS:
                                </td>
                                <td><b> {{ r * 0.18 }} </b></td>
                            </tr>

                            <tr>
                                <td>
                                    Today's Total GST:
                                </td>
                                <td><b>{{ t * 0.18 }}</b></td>
                            </tr>
                            <tr>
                                <td>
                                     Over All GST Collection:
                                </td>
                                <td><b>{{ OverallgstAmount }}</b></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6 alert alert-warning">
                         <h3 class="text-center">Denomination Check</h3><hr>
                         <table>
                             <tr>
                                 <td>2000 X</td>
                                 <td><input type="text" class="form-control col-md-6" v-model="twothousand"></td>
                                 <td><span>= {{ t1 = twothousand * 2000 }}</span></td>
                             </tr>
                             <tr>
                                 <td>500 X</td>
                                 <td><input type="text" class="form-control col-md-6" v-model="fivehundred"></td>
                                 <td><span>= {{ t2 = fivehundred * 500 }} </span></td>
                             </tr>
                             <tr>
                                 <td>200 X</td>
                                 <td><input type="text" class="form-control col-md-6" v-model="twohundred"></td>
                                 <td><span>= {{ t3 = twohundred * 200 }}</span></td>
                             </tr>
                             <tr>
                                 <td>100 X</td>
                                 <td><input type="text" class="form-control col-md-6" v-model="onehundred"></td>
                                 <td><span>= {{ t4 = onehundred * 100 }} </span></td>
                             </tr>
                             <tr>
                                 <td>50 X</td>
                                 <td><input type="text" class="form-control col-md-6" v-model="fifty"></td>
                                 <td><span>= {{ t5 = fifty * 50 }}</span></td>
                             </tr>
                             <tr>
                                 <td>20 X</td>
                                 <td><input type="text" class="form-control col-md-6" v-model="twenty"></td>
                                 <td><span>= {{ t6 = twenty * 20 }}</span></td>
                             </tr>
                             <tr>
                                 <td>10 X</td>
                                 <td><input type="text" class="form-control col-md-6" v-model="ten"></td>
                                 <td><span>= {{ t7 = ten * 10 }}</span></td>
                             </tr>
                             <tr>
                                 <td>5 X</td>
                                 <td><input type="text" class="form-control col-md-6" v-model="five"></td>
                                 <td><span>= {{ t8 = five * 5 }}</span></td>
                             </tr>
                         </table>
                        <hr>
                        <div class="form-inline">
                           <b>Grand Total: {{ t1+t2+t3+t4+t5+t6+t7+t8 }}</b>
                        </div>

                    </div>
                  </div>
                        </div>
                    <div class="card-footer">
                        <button class="btn btn-success btn-sm" @click="print">
                          <i class="fa fa-dot-circle-o"></i> Print
                        </button>
                      </div>
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
        searchResult: '',
        twothousand: '',
        fivehundred: '',
        twohundred: '',
        onehundred: '',
        fifty: '',
        twenty: '',
        ten: '',
        five: '',
        collectionregister: [],
        OveralltotalAmount:'',
        OverallgstAmount:'',
        todaystotalAmount: '',
        todaysgstAmount: '',
        TotalAmountByCash: '',
        TotalAmountByCheque: '',
        TotalAmountByRtgs: '',
        TodaysTotalAmountByCash: '',
        TodaysTotalAmountByCheque: '',
        TodaysTotalAmountByRtgs: '',
        todaysDailyAmount: '',
        todaysDailyAmountByCheque:'',
        todaysDailyAmountByRtgs: ''
    }
},
methods: {
    fetchCollectionRegister(){
        const token = localStorage.getItem('token');
        fetch('api/fetchcollectionregister?token='+token)
        .then(res => res.json())
        .then((res) => {
            this.TotalAmountByCash = res.TotalAmountByCash;
            this.TotalAmountByCheque = res.TotalAmountByCheque;
            this.TotalAmountByRtgs = res.TotalAmountByRtgs;

            this.TodaysTotalAmountByCash = res.TodaysTotalAmountByCash;
            this.TodaysTotalAmountByCheque = res.TodaysTotalAmountByCheque;
            this.TodaysTotalAmountByRtgs = res.TodaysTotalAmountByRtgs;

            this.OveralltotalAmount = res.OverallTotalCollection;
            // this.collectionregister = res.data;
            // this.OveralltotalAmount = res.OverallTotalAmount;
            // this.OverallgstAmount = res.OverallgstAmount;
            // this.todaystotalAmount = res.todaystotalAmount;
            // this.todaysgstAmount = res.todaysgstAmount;
            // this.TodaysTotalAmountByCash = res.TodaysTotalAmountByCash;
            // this.TodaysTotalAmountByCheque = res.TodaysTotalAmountByCheque;
            // this.TodaysTotalAmountByRtgs = res.TodaysTotalAmountByRtgs;
            // this.todaysDailyAmount = res.totalDailyCollection;
            // this.todaysDailyAmountByCheque = res.todayscollectionByCheque;
            // this.todaysDailyAmountByRtgs = res.todaysCollectionByRtgs;
        })
    },
    print(){
        window.print()
    }
},
        created() {
            this.fetchCollectionRegister();
            const token = localStorage.getItem('token');
            Event.$on("searching", inputWord => {
            axios.get('/api/search?q='+inputWord+'&token='+token)
            .then((data) => {
                this.searchResult = data.data;
                // import('./MyComponent.vue')
            // Vue.component('search', require('../components/Search.vue').default);
                })
            })
        }
    }
</script>
