<template>
    <div class="container-fluid">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Transfer Case</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Transfer Case</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Transfer Case</strong>
                    </div>
                    <div class="card-body">
                    <table class="table" v-if="users.selected == 0">
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
                    <tr v-for="item in rejectedCase" :key="item.id">
                        <td>{{ item.caseid }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.helper }}</td>
                        <td><a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></td>
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
                    <table class="table" v-if="users.selected == 1">
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
                    <tr v-for="item in rejectedCase" :key="item.id">
                        <td>{{ item.caseid }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.helper }}</td>
                        <td><a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></td>
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
            <table class="table" v-if="users.selected == 2">
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
                    <tr v-for="item in rejectedCaseEmployee" :key="item.id">
                        <td>{{ item.caseid }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.helper }}</td>
                        <td><a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></td>
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
  props : ['user'],
data(){
    return {
        value: null,
        time1: '',
        time2: '',
        time3: '',
        // custom lang
        lang: 'en',
        rejectedCase: [],
        rejectedCaseEmployee: [],
        toAdmin: {
            caseid: '',
            docs: '',
            assignedEmployee: '',
            helper: ''
        },
         users: {
          email: '',
          selected: ''
      }
    }
},
created(){
    this.fetchCases();
    this.fetchTransferCaseEmployee();
    this.fetchUser();
    // this.loadEmployee();
    // console.log(this.$refs)
    // console.log(field);
},
    methods: {
        fetchCases(page_url){
            const token = localStorage.getItem('token');
            page_url = page_url || 'api/fetchrejectedcase/?token='+token;
            let vm = this;
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.rejectedCase = res.data;
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
        fetchTransferCaseEmployee(){
            const token = localStorage.getItem('token');
            fetch('api/fetchtransferedcaseemployee/?token='+token)
            .then(res => res.json())
            .then(res => {
                this.rejectedCaseEmployee = res.data;
            })
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
        },
        sendToAdmin(id){
            this.toAdmin.caseid = id.caseid;
            this.toAdmin.assignedEmployee = id.employee_id;
            this.toAdmin.helper = id.helper;
            this.toAdmin.docs = id.docs;
            Swal.fire({
            title: 'Are you sure want send to Admin again?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, send it!'
            }).then((result) => {
                if (result.value) {
                    fetch(`api/sendtoadminagain`, {
                        method: 'post',
                        body: JSON.stringify(this.toAdmin),
                        headers: {
                            'content-type' : 'application/json'
                        }
                    })
                    .then(()=>{
                        Swal.fire(
                        'Sent!',
                        'Your file has been sent.',
                        'success'
                        )

                        fetch(`api/sendtoadminagain/${id.caseid}`, {
                            method: 'delete'
                        })
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
    fetchUser(){
        const token = localStorage.getItem('token');
        fetch('/api/auth/me?token=' +token)
                .then(res=>res.json())
                .then(data => {
                    this.users.email = data.email;
                    this.users.selected = data.selected;
                    if(data.error == "Token is expired"){
                        window.location.href = '/';
                    }
                })
        }
    }
}
</script>
