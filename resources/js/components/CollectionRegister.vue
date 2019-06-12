<template>
    <div class="container-fluid">
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
                            <table class="table">
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
                    <div class="col-md-4">
                        <div class="form-group">
                            Today's Total Collection: <b>{{ todaystotalAmount }}</b>
                        </div>
                        <div class="form-group">
                            Today's Total GST: <b>{{ todaysgstAmount }}</b>
                        </div>
                        <div class="form-group">
                            Today's Total Collection By Cash: <b>{{ TodaysTotalAmountByCash }}</b>
                        </div>
                        <div class="form-group">
                            Today's Total Collection By Cheque: <b>{{ TodaysTotalAmountByCheque }}</b>
                        </div>
                        <div class="form-group">
                            Today's Total Collection By NEFT/RTGS: <b> {{ TodaysTotalAmountByRtgs }} </b>
                        </div>
                        <div class="form-group">
                            Over All Total Collection: <b>{{ OveralltotalAmount }}</b>
                        </div>
                        <div class="form-group">
                            Over All GST Collection: <b>{{ OverallgstAmount }}</b>
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            2000 X  &nbsp;<input type="text" class="form-control" v-model="twothousand"> &nbsp;<span>= {{ t1 = twothousand * 2000 }}</span>
                        </div><br>
                        <div class="form-inline">
                            500 X  &nbsp;<input type="text" class="form-control" v-model="fivehundred"> &nbsp;<span>= {{ t2 = fivehundred * 500 }} </span>
                        </div>

                        <br>
                        <div class="form-inline">
                            200 X  &nbsp;<input type="text" class="form-control" v-model="twohundred"> &nbsp;<span>= {{ t3 = twohundred * 200 }}</span>
                        </div>

                        <br>
                        <div class="form-inline">
                            100 X  &nbsp;<input type="text" class="form-control" v-model="onehundred"> &nbsp;<span>= {{ t4 = onehundred * 100 }} </span>
                        </div>
                        <br>
                        <div class="form-inline">
                            50 X  &nbsp;<input type="text" class="form-control" v-model="fifty"> &nbsp;<span>= {{ t5 = fifty * 50 }}</span>
                        </div>
                        <br>
                        <div class="form-inline">
                            20 X  &nbsp;<input type="text" class="form-control" v-model="twenty"> &nbsp;<span>= {{ t6 = twenty * 20 }}</span>
                        </div>
                        <br>
                        <div class="form-inline">
                            10 X  &nbsp;<input type="text" class="form-control" v-model="ten"> &nbsp;<span>= {{ t7 = ten * 10 }}</span>
                        </div>
                        <br>
                        <div class="form-inline">
                            5 X  &nbsp;<input type="text" class="form-control" v-model="five"> &nbsp;<span>= {{ t8 = five * 5 }}</span>
                        </div>
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
</template>

<script>
import DatePicker from 'vue2-datepicker'
export default {
  components: { DatePicker },
  data() {
    return {
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
        TodaysTotalAmountByCash: '',
        TodaysTotalAmountByCheque: '',
        TodaysTotalAmountByRtgs: ''
    }
},
methods: {
    fetchCollectionRegister(){
        const token = localStorage.getItem('token');
        fetch('api/fetchcollectionregister?token='+token)
        .then(res => res.json())
        .then((res) => {
            this.collectionregister = res.data;
            this.OveralltotalAmount = res.OverallTotalAmount;
            this.OverallgstAmount = res.OverallgstAmount;
            this.todaystotalAmount = res.todaystotalAmount;
            this.todaysgstAmount = res.todaysgstAmount;
            this.TodaysTotalAmountByCash = res.TodaysTotalAmountByCash;
            this.TodaysTotalAmountByCheque = res.TodaysTotalAmountByCheque;
            this.TodaysTotalAmountByRtgs = res.TodaysTotalAmountByRtgs;
        })
    },
    print(){
        window.print()
    }
},
        created() {
            this.fetchCollectionRegister();
        }
    }
</script>
