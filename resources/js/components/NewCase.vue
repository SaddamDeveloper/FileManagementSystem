<template>
    <div class="container-fluid">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>New Case</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">New Case</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Registered Case</h4>
                                </div>
                                <div class="card-body">
                                    <div class="default-tab">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Individual</a>
                                                <a class="nav-item nav-link active show" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Govt & all</a>

                                            </div>
                                        </nav>
                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                            <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <table class="table">
                                                        <thead>
                                                            <tr>
                                                            <th scope="col">#Case</th>
                                                            <th scope="col">Types of Work</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Client Name</th>
                                                            <th scope="col">Contact No</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Delivery Date</th>
                                                            <th scope="col">Assigned To</th>
                                                            <th scope="col" v-if="users.selected == 1">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                    <tr v-for="item in cases" v-bind:key="item.id">
                        <td>{{ item.caseid }}</td>
                        <td>{{ item.typeofwork }}</td>
                        <td>{{ item.amount }}</td>
                        <td>{{ item.clientName }}</td>
                        <td>{{ item.contactNo }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.time2 }}</td>
                        <td><div class="alert alert-danger" v-for="emp in employeeassigned" v-bind:key="emp.id" :value="emp.employee_id" v-if="item.caseid == emp.caseid" data-toggle="modal" :data-target="'#exampleModalss'+item.caseid">{{ emp.name }}</div></td>
                        <td v-if="users.selected == 1"><div class="btn btn-group"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" :data-target="'#exampleModal'+item.caseid"><i class="fa fa-plus"></i></button><button type="button" @click="editCase(item)" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button><button type="button" @click="deleteCase(item.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></div></td>
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

            <form @submit.prevent="sendToEmployee(item)">
            <div class="modal-body" >
                <table class="table table-hovered">
                    <tr>
                        <th>CaseID</th>
                        <th>Client Name</th>
                        <th>Amount</th>
                        <th width="20%">Delivery Date</th>
                        <th width="20%">Assign Employee</th>
                        <th width="20%">Support Staff</th>
                        <th>Upload Docs</th>
                    </tr>
                    <tr>
                        <td id="caseid">{{ item.caseid }}</td>
                        <td>{{ item.clientName }}</td>
                        <td>{{ item.amount }}</td>
                        <td>{{ item.time2 }}</td>
                        <td>
                            <select class="form-control" name="employee_id" v-model="toEmployee.employee_id" required>
                                <option v-for="employee in employees" v-bind:key="employee.id" :value="employee.employee_id">{{ employee.name }}</option>
                            </select>
                        </td>
                        <td>
                           <multiselect name="helper[]" v-model="toEmployee.helper" :options="optionsS" :multiple="true" deselectLabel="Remove" selectLabel="Select"></multiselect>
                        </td>
                        <td>
                            <!-- <form action="/multiuploads" method="post" enctype="multipart/form-data"> -->
                               <input type="file" name="docs" @change="processFile">
                            <!-- </form> -->
                        </td>
                    </tr>
                </table>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" :id="'exampleModalss'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Re Assign Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form @submit.prevent="reassign(item)">
            <div class="modal-body" >
                <table class="table table-hovered">
                    <tr>
                        <th>Re Assign Employee</th>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="employee_id" v-model="reAssign.employee_id">
                                <option v-for="employee in employees" v-bind:key="employee.id" :value="employee.employee_id">{{ employee.name }}</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
        </div>
        </div>
                    </tr>
                    </tbody>
                        </table>
                            <!-- pagination -->
                    <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item" v-bind:class="[{ disabled: !prev_page_url }]"><a class="page-link" href="#" @click="fetchCases(prev_page_url)">Previous</a></li>
                                <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ current_page }} of {{ last_page }}</a></li>
                                <li class="page-item" v-bind:class="[{ disabled: !next_page_url }]"><a class="page-link" href="#" @click="fetchCases(next_page_url)">Next</a></li>
                            </ul>
                        </nav>
                                            </div>
                                            <div class="tab-pane fade active show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <table class="table">
                                                        <thead>
                                                            <tr>
                                                           <th scope="col">#Case</th>
                                                            <th scope="col">Types of Work</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Contact Person Name</th>
                                                            <th scope="col">Organisation</th>
                                                            <th scope="col">Department</th>
                                                            <th scope="col">Delivery Date</th>
                                                            <th scope="col">Assigned To</th>
                                                            <th scope="col" v-if="users.selected == 1">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="item in govtnall" v-bind:key="item.id">
                                                             <td>{{ item.caseid }}</td>
                                                            <td>{{ item.typeofwork }}</td>
                                                            <td>{{ item.amount }}</td>
                                                            <td>{{ item.contactPersonName }}</td>
                                                            <td>{{ item.orgName }}</td>
                                                            <td>{{ item.dept }}</td>
                                                            <td>{{ item.time2 }}</td>
                                                            <td><div class="alert alert-danger" v-for="emp in assignedemployee" v-bind:key="emp.id" :value="emp.employee_id" v-if="item.caseid == emp.caseid" data-toggle="modal" :data-target="'#exampleModalss'+item.caseid">{{ emp.name }}</div></td>
                                                            <td v-if="users.selected == 1"><div class="btn btn-group"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" :data-target="'#exampleModal'+item.caseid"><i class="fa fa-plus"></i></button><button type="button" @click="editCase(item)" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button><button type="button" @click="deleteCase(item.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></div></td>
    <div class="modal fade" :id="'exampleModal'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form @submit.prevent="sendToEmployee(item)">
            <div class="modal-body" >
                <table class="table table-hovered">
                    <tr>
                        <th>CaseID</th>
                        <th>Client Name</th>
                        <th>Amount</th>
                        <th width="20%">Delivery Date</th>
                        <th width="20%">Assign Employee</th>
                        <th width="20%">Support Staff</th>
                        <th>Upload Docs</th>
                    </tr>
                    <tr>
                        <td id="caseid">{{ item.caseid }}</td>
                        <td>{{ item.clientName }}</td>
                        <td>{{ item.amount }}</td>
                        <td>{{ item.time2 }}</td>
                        <td>
                            <select class="form-control" name="employee_id" v-model="toEmployee.employee_id" required>
                                <option v-for="employee in employees" v-bind:key="employee.id" :value="employee.employee_id">{{ employee.name }}</option>
                            </select>
                        </td>
                        <td>
                           <multiselect name="helper[]" v-model="toEmployee.helper" :options="optionsS" :multiple="true" deselectLabel="Remove" selectLabel="Select"></multiselect>
                        </td>
                        <td>
                            <!-- <form action="/multiuploads" method="post" enctype="multipart/form-data"> -->
                               <input type="file" name="docs" @change="processFile">
                            <!-- </form> -->
                        </td>
                    </tr>
                </table>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" :id="'exampleModalss'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Re Assign Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form @submit.prevent="reassign(item)">
            <div class="modal-body" >
                <table class="table table-hovered">
                    <tr>
                        <th>Re Assign Employee</th>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="employee_id" v-model="reAssign.employee_id">
                                <option v-for="employee in employees" v-bind:key="employee.id" :value="employee.employee_id">{{ employee.name }}</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
        </div>
        </div>
                                                        </tr>
                                                </tbody>
                                            </table>
                                             <!-- pagination -->

                                            </div>

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
            first_page_url: '',
            last_page_url: '',
            next_page_url: '',
            prev_page_url: '',
            current_page: '',
            last_page: '',
            value: null,
            optionsS: [],
            time1: '',
            time2: '',
            time3: '',
            // custom lang
            lang: 'en',
            cases: [],
            govtnall: [],
            assignedemployee:'',
            employeeassigned: [],
            employees: [],
            users: {
                email: '',
                selected: ''
            },
            casee: {

                caseid: '',
                clientType: '',
                typeofwork: '',
                amount: '',
                clientName: '',
                contactNo: '',
                altContactNo: '',
                email: '',
                address: '',
                time2: '',
                selected: ''
            },
            caseid: '',
            pagination: {},
            edit: false,
            selected: "1",
            optiontypes: [
                { id: 1, name: 'Select Payment Method'},
                { id: 2, name: 'Cash' },
                { id: 3, name: 'Cheque' },
                { id: 4, name: 'RTGS/NEFT' }
            ],
             clientType: "1",
                options: [
                    {id: 1, name: 'Select client type'},
                    {id: 2, name: 'Individual'},
                    {id: 3, name: 'Govt'},
                    {id: 4, name: 'Pvt Ltd'},
                    {id: 5, name: 'NGO'}
                ],
                toEmployees: [],
                toEmployee: {
                caseid: '',
                employee_id: '',
                helper: [],
                docs: '',
                fileName:''
            },
            reAssign: {
                employee_id: ''
            }
        }
    },
    created(){
        this.fetchCases();
        this.loadEmployee();
        this.fetchGovtnAll();
        this.fetchUser();
        this.loadSupportStaff();
        // this.fetchsendEmployees();
    },
    methods: {
        fetchCases(page_url){
            const token = localStorage.getItem('token');
            page_url = page_url || '/api/cases?token=' +token;
            let vm = this;
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.cases = res.data;
                // vm.makePagination(res.meta, res.links);
                this.first_page_url = res.first_page_url+"&token="+token;
                this.last_page_url = res.last_page_url+"&token="+token;
                this.next_page_url = res.next_page_url+"&token="+token;
                this.prev_page_url = res.prev_page_url+"&token="+token;
                this.current_page = res.current_page;
                this.last_page = res.last_page;
            })
            fetch("/api/fetchsendemployees?token="+token)
                 .then(res => res.json())
                .then(res => {
                    this.employeeassigned = res;
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
        fetchGovtnAll(page_url){
            const token = localStorage.getItem('token');
            page_url = page_url || '/api/casesgovtnall?token=' +token;
            let vm = this;
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.govtnall = res.data;
            })
                fetch("/api/fetchsendemployees?token="+token)
                 .then(res => res.json())
                .then(res => {
                    // console.log(res);
                    this.assignedemployee = res.data;
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
                    const token = localStorage.getItem('token');
                    fetch(`api/case/${id}`+'?token='+token, {
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
            const token = localStorage.getItem('token');
             axios.get("/api/employees?token="+token).then((res) => {
                 this.employees = res.data;
                //  console.log(res.data)
             });
        },
        loadSupportStaff(){
            const token = localStorage.getItem('token');
             axios.get("/api/supportstaff?token="+token).then((res) => {
                 this.optionsS = res.data;
             });
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
            const token = localStorage.getItem('token');
            this.toEmployee.caseid = id.caseid;
            fetch(`api/sendemployee?token=`+token, {
                method: 'post',
                body: JSON.stringify(this.toEmployee),
                    headers: {
                'content-type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(res => {
                this.toEmployee.assignedEmployee = '';
                this.toEmployee.helper = '';
                this.toEmployee.assignedEmployee = '';
                fetch("/api/fetchsendemployees?token="+token)
                 .then(res => res.json())
                .then(res => {
                    this.employeeassigned = res;
            })
               if(res.message){
                   Swal.fire(
                        'Failed!',
                        'This case is already Reservered',
                        'warning'
                    )
               }
               else{
                   Swal.fire(
                   'Assigned!',
                   'Case Has been Assigned!.',
                   'success'
                   )
                   jQuery('#exampleModal'+this.toEmployee.caseid).modal('hide')
               }

            })
            .catch(err => console.log(err));
        },
        reassign(item){
            const token = localStorage.getItem('token');
            const id = item.caseid;
            this.toEmployee.caseid = id.caseid;
            Swal.fire({
            title: 'Are you sure want to transfer the case?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, transfer it!'
            }).then((result) => {
                if (result.value) {
                    const token = localStorage.getItem('token');
                    fetch('api/updateemployee/'+id+'/?token='+token, {
                        method: 'put',
                        body: JSON.stringify(this.reAssign),
                            headers: {
                        'content-type': 'application/json'
                        }
                    })
                    .then(()=>{
                        Swal.fire(
                        'Transfered!',
                        'Case has been Transferred successfully.',
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
        },
        fetchAssignedEmployee(){
            fetch("/api/fetchsendemployees?token="+token)
                .then(res => res.json())
                .then(res => {
                    // console.log(res);
                    this.assignedemployee = res.data;
            })
        }
    },
    computed: {
        isDisabled() {
            const token = localStorage.getItem('token');
            fetch("/api/fetchsendemployees?token="+token)
                 .then(res => res.json())
                .then(res => {
                    this.status = res
                    console.log(res);
            })
        }
    }
}
</script>
