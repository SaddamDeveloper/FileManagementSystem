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
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-primary" @click="print">Print</button>
                    </div>

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
