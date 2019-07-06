<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Search results</strong>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                            <div class="col-md-12">
                                <button @click="myFunction()" class="btn btn-success btn-block mb-2">Filter</button>
                                <div id="myDIV" style="display: none">
                                    <date-range-picker :from="$route.query.from" :to="$route.query.to" :panel="$route.query.panel" @update ="update" />
                                    <div class="row mb-2">
                                        <select class="form-control col-md-6">
                                            <option >--Filter--</option>
                                            <option >Completed Case</option>
                                            <option >Approved case</option>
                                            <option >Rejected Case</option>
                                        </select>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" v-model="form.date" @change="searchUsingDate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#Case</th>
                                    <th scope="col">ClientName</th>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">TOW</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Delivery Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in searchResult" v-bind:key="item.caseid">
                                <td>{{ item.caseid }}</td>
                                <td>{{ item.clientName }}</td>
                                <td>{{ item.contactNo }}</td>
                                <td>{{ item.email }}</td>
                                <td>{{ item.typeofwork }}</td>
                                <td>{{ item.amount }}</td>
                                <td>{{ item.time2 }}</td>
                            </tr>
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
export default {
    data(){
        return{
            isActive: false,
            searchResult: [],
            nodata: '',
            form : {
                date : ''
            }
        }
    },
    created(){
        const token = localStorage.getItem('token');
            Event.$on("searching", inputWord => {
                axios.get('/api/search?q='+inputWord+'&token='+token)
                .then((data) => {
                    this.searchResult = data.data;

                })
            })
    },
    methods: {
        myFilter: function(){
            this.isActive = !this.isActive;
          // some code to filter users
        },
        update(values){
            const token = localStorage.getItem('token');

            this.$router.push({ query: Object.assign({}, this.$route.query, {
                to: values.to,
                from: values.from,
                })
            })
            var to = this.$route.query.to.substr(0,10);
            var from = this.$route.query.from.substr(0,10);
            axios.get('api/searchusingdaterange?from='+from+'&to='+to+'&token='+token)
            .then((res) => {
               this.searchResult = res.data;
        })
        // console.log(this)
        },
        searchUsingDate(){
            const token = localStorage.getItem('token');
            axios.get('api/searchusingdate?date='+this.form.date+'&token='+token)
            .then((res)=>{
                this.searchResult = res.data;
                console.log(this.searchResult);
            })
        },
        myFunction(){
               var x = document.getElementById("myDIV");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
        }
    }
}
</script>

