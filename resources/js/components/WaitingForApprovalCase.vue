<template>
    <div class="container-fluid">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Waiting For Approval Case</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Waiting For Approval Case</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Waiting For Approval Case</strong>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#Case</th>
                            <th scope="col">Assigned Employee</th>
                            <th scope="col">Helper</th>
                            <th scope="col">Related Documents</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in assignedemployees" v-bind:key="item.id">
                        <td>{{ item.caseid }}</td>
                        <td>{{ item.assignedEmployee }}</td>
                        <td>{{ item.helper }}</td>
                        <td><a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></td>
                        <td><button type="button" class="btn btn-success btn-sm" data-toggle="modal" :data-target="'#exampleModal'+item.caseid"><i class="fa fa-plus"></i></button><button type="button" @click="editCase(item)" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button><button type="button" @click="deleteCase(item.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                                   <!-- Modal -->
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

</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
export default {
        data(){
        return {
            value: null,
            time1: '',
            time2: '',
            time3: '',
            // custom lang
            lang: 'en',
            assignedemployees: [],
        }
    },
    created(){
        this.fetchCases();
        this.loadEmployee();
        // console.log(this.$refs)
        // console.log(field);
    },
    methods: {
        fetchCases(page_url){
            page_url = page_url || 'api/assignedemployees';
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
        }
    }
}
</script>
