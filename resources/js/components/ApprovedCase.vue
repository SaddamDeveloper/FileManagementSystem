<template>
    <div class="container-fluid">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Approved Case</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Approved Case</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Approved Case</strong>
                    </div>
                    <div class="card-body">
                    <table class="table" v-if="users.selected == 0">
                        <thead>
                            <tr>
                                <th scope="col">#Case</th>
                                <th scope="col">Assigned Employee</th>
                                <th scope="col">Helper</th>
                                <th scope="col">Assigned Docs by Admin</th>
                                <th scope="col">Final Docs By Employee</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tr v-for="(item, i) in completedcases" :key="i">
                            <td>{{ item.caseid }}</td>
                            <td><input type="hidden" :value="item.employee_id">{{ item.name }}</td>
                            <td>{{ item.helper }}</td>
                            <td></td>
                            <td><a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></td>
                            <td></td>
                            <td><div class="alert alert-primary alert-sm">Approved</div></td>
        <!-- Modal -->
        <div class="modal fade" :id="'exampleModal'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reason for Rejection</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="pushToApproved(item.caseid)">
                <div class="modal-body">
                    <table class="table table-resonsive table-bordered">
                        <tr>
                            <thead>Remarks</thead>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control"></td>
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
                    <tbody>

                </tbody>
            </table>
                    <table class="table" v-if="users.selected == 1">
                        <thead>
                            <tr>
                                <th scope="col">#Case</th>
                                <th scope="col">Assigned Employee</th>
                                <th scope="col">Helper</th>
                                <th scope="col">Assigned Docs by Admin</th>
                                <th scope="col">Final Docs By Employee</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tr v-for="(item, i) in completedcases" :key="i">
                            <td>{{ item.caseid }}</td>
                            <td><input type="hidden" :value="item.employee_id">{{ item.name }}</td>
                            <td>{{ item.helper }}</td>
                            <td></td>
                            <td><a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></td>
                            <td></td>
                            <td><div class="alert alert-primary alert-sm">Approved</div></td>
        <!-- Modal -->
        <div class="modal fade" :id="'exampleModal'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reason for Rejection</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="pushToApproved(item.caseid)">
                <div class="modal-body">
                    <table class="table table-resonsive table-bordered">
                        <tr>
                            <thead>Remarks</thead>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control"></td>
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
                    <tbody>

                </tbody>
            </table>
                    <table class="table" v-if="users.selected == 2">
                        <thead>
                            <tr>
                                <th scope="col">#Case</th>
                                <th scope="col">Assigned Employee</th>
                                <th scope="col">Helper</th>
                                <th scope="col">Assigned Docs by Admin</th>
                                <th scope="col">Final Docs By Employee</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tr v-for="(item, i) in approvedcaseemp" :key="i">
                            <td>{{ item.caseid }}</td>
                            <td><input type="hidden" :value="item.employee_id">{{ item.name }}</td>
                            <td>{{ item.helper }}</td>
                            <td></td>
                            <td><a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></td>
                            <td></td>
                            <td><div class="alert alert-primary alert-sm">Approved</div></td>
        <!-- Modal -->
        <div class="modal fade" :id="'exampleModal'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reason for Rejection</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="pushToApproved(item.caseid)">
                <div class="modal-body">
                    <table class="table table-resonsive table-bordered">
                        <tr>
                            <thead>Remarks</thead>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control"></td>
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
                    <tbody>

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
            completedcases: [],
            approvedcaseemp: [],
             users: {
            email: '',
            selected: ''
            }
        }
    },
    created(){
        this.fetchCases();
        this.fetchApprovedCaseEmployee();
        this.fetchUser();
        // this.loadEmployee();
        // console.log(this.$refs)
        // console.log(field);
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
        fetchApprovedCaseEmployee(){
            const token = localStorage.getItem('token');
            fetch('api/approvedcaseemployee?token='+token)
            .then(res => res.json())
            .then(res => {
                this.approvedcaseemp = res.data;
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
        confirmApprove(item){
            Swal.fire({
            title: 'Do you want to Approve?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Approve it!'
            }).then((result) => {
                if (result.value) {
                    this.toApproval.caseid = item.caseid;
                    this.toApproval.employee_id = item.employee_id;
                    fetch(`api/sendapproval`, {
                    method: 'post',
                    body: JSON.stringify(this.toApproval),
                        headers: {
                    'content-type': 'application/json'
                    }
            })
            .then(res => res.json())
            .then(res => {
                this.toApproval.caseid = '';
                this.toApproval.employee_id = '';
                jQuery('#exampleModal'+this.toApproval.caseid).modal('hide');
            })
            .then(Swal.fire(
                'Approved!',
                'Case Has been Successfully Approved!',
                'success'
            ))
            .catch(err => console.log(err))
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
