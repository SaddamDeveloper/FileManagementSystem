<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Search results</strong>
                    </div>
                    <div class="card-body">
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
            searchResult: [],
            nodata: ''
        }
    },
    created(){
        const token = localStorage.getItem('token');
            Event.$on("searching", inputWord => {
                axios.get('/api/search?q='+inputWord+'&token='+token)
                .then((data) => {
                    this.searchResult = data.data;
                    console.log(data);
                })
            })
    },
    methods: {
        MethodName(){
            console.log();
        }
    }
}
</script>

