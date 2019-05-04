<template>
    <div class="container-fluid">
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in assignedemployees" v-bind:key="item.id">
                        <td>{{ item.caseid }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.helper }}</td>
                        <td><a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></td>
                        <td> NA </td>
                        <td><button type="button" class="btn btn-success btn-sm" data-toggle="modal" :data-target="'#exampleModal'+item.caseid"><i class="fa fa-plus"></i></button><button type="button" @click="sendToAdmin(item)" class="btn btn-primary btn-sm"><i class="fa fa-send-o"></i></button></td>
                                   <!-- Modal -->
        <div class="modal fade" :id="'exampleModal'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="pushToDb(item.caseid)">
                <div class="modal-body">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>Docs</th>
                            <th>Remarks</th>
                        </tr>
                        <tr>
                            <td><input type="file" name="docs" @change="processFile"></td>
                            <td><input type="text" value=""></td>
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
            toDb: {
                docs: '',
                remarks: ''
            },
            toAdmin: {
                caseid: '',
                docs: '',
                assignedEmployee: '',
                helper: ''
            }
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
            page_url = page_url || 'api/employeeassignedemployees';
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
                this.toDb.docs = e.target.result
            }
            this.toDb.fileName = e.target.files[0].name
        },
        pushToDb(id){
            this.toDb.caseid = id;
            fetch(`api/sendtodb`, {
                method: 'post',
                body: JSON.stringify(this.toDb),
                    headers: {
                'content-type': 'application/json'
                }
            })
        },
        sendToAdmin(id){
            this.toAdmin.caseid = id.caseid;
            this.toAdmin.assignedEmployee = id.employee_id;
            this.toAdmin.helper = id.helper;
            this.toAdmin.docs = id.docs;
            fetch(`api/sendtoadmin`, {
                method: 'post',
                body: JSON.stringify(this.toAdmin),
                headers: {
                    'content-type' : 'application/json'
                }
            })
        }
    }
}
</script>
