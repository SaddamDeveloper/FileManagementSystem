<template>
    <div class="container-fluid">
        <search v-if="this.searchResult"></search>
        <div v-if="!this.searchResult">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Assigned Case</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Assigned Case</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Assigned Case</strong>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#Case</th>
                            <th scope="col">Assigned Employee</th>
                            <th scope="col">Helper</th>
                            <th scope="col">Related Documents</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in assignedemployees" v-bind:key="item.caseid">
                        <td>{{ item.caseid }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.helper }}</td>
                        <td><a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></td>
                        <td> <div class="alert alert-danger">
                          Assigned
                        </div> </td>                                   <!-- Modal -->
        <div class="modal fade" :id="'exampleModal'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            </div>
        </div>
        </div>
        </tr>
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
export default {
        data(){
        return {
            assignedemployees: [],
            searchResult: ''
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
        // this.loadEmployee();
        // console.log(this.$refs)
        // console.log(field);
    },
    methods: {
        fetchCases(page_url){
            const token = localStorage.getItem('token');
            page_url = page_url || 'api/assignedemployees?token='+token;
            let vm = this;
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.assignedemployees = res.data;
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
        }
    }
}
</script>
