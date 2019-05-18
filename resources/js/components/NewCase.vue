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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Registered Case</strong>
                    </div>
                    <div class="card-body">
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
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
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
                        <td><div class="alert alert-danger">NA</div></td>
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

            <form @submit.prevent="sendToEmployee(item)">
            <div class="modal-body" >
                <table class="table table-hovered">
                    <tr>
                        <th>CaseID</th>
                        <th>Client Name</th>
                        <th>Amount</th>
                        <th width="20%">Delivery Date</th>
                        <th width="20%">Assign Employee</th>
                        <th width="20%">Helper</th>
                        <th>Upload Docs</th>
                    </tr>
                    <tr>
                        <td id="caseid">{{ item.caseid }}</td>
                        <td>{{ item.clientName }}</td>
                        <td>{{ item.amount }}</td>
                        <td>{{ item.time2 }}</td>
                        <td>
                            <select class="form-control" name="employee_id" v-model="toEmployee.employee_id">
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
            optionsS: ['Mohit', 'Rajesh', 'Raju'],
            time1: '',
            time2: '',
            time3: '',
            // custom lang
            lang: 'en',
            cases: [],
            employees: [],
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
            }
        }
    },
    created(){
        this.fetchCases();
        this.loadEmployee();
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
            const token = localStorage.getItem('token');
             axios.get("/api/employees?token="+token).then(( { data }) => (this.employees = data));
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
            this.toEmployee.caseid = id.caseid;
            fetch(`api/sendemployee`, {
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
                Swal.fire(
                'Sent!',
                'Case Has been Sent!.',
                'success'
                )

                jQuery('#exampleModal'+this.toEmployee.caseid).modal('hide')
            })
            .catch(err => console.log(err));
        }
    }
}
</script>
