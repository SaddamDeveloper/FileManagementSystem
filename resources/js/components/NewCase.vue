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
                            <th scope="col">Asign Employee</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in cases" :key="item.id">
                        <td v-bind="form.caseid">{{ item.caseid }}</td>
                        <td>{{ item.typeofwork }}</td>
                        <td>{{ item.amount }}</td>
                        <td>{{ item.clientName }}</td>
                        <td>{{ item.contactNo }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.time2 }}</td>
                        <td>
                            <button type="button" @click="assignEmployee(item.id)" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                            <button type="button" @click="deleteCase(item.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
                    </div>
                </div>
            </div>
        </div>
                <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form @submit.prevent="sendToEmployee" @keydown="form.onKeydown($event)">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#Case</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Contact No</th>
                            <th scope="col">Delivery Date</th>
                            <th scope="col">Asign Employee</th>
                            <th scope="col">Support Team</th>
                            <th scope="col">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in cases" :key="item.id">
                        <td id="case">{{ item.caseid }}</td>
                        <td>{{ item.clientName }}</td>
                        <td>{{ item.contactNo }}</td>
                        <td>{{ item.time2 }}</td>
                        <td>
                            <select v-model="form.selected" selected class="form-control">
                                <option v-for="employee in employees" :key="employee.id">
                                    {{ employee.name }}
                                </option>
                            </select>
                        </td>
                        <td>
                            <v-select name="mselected[]" v-model="form.mselected" multiple :options="['Amit','Mohit']"></v-select>
                        </td>
                        <td><textarea v-model="form.remarks" name="remarks" class="form-control"></textarea></td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Assign</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return{
                selected: 'Select Employee',
                cases: {},
                employees: {},
                mselect: [],
                form: new Form({
                    caseid: '',
                    selected: '',
                    mselected: '',
                    remarks: ''
                })
            }
        },
    methods: {
        sendToEmployee(){
        this.$Progress.start();
        // let dcaseid = jQuery('#case').text();
        // this.form = new Form({caseid: dcaseid});
        //console.log(jQuery('#case').text());
        this.form.post('api/sendemployee')
                .then(()=>{
        toast.fire({
            type: 'success',
            title: 'Saved successfully'
        })
            this.$Progress.finish();
        })
        .catch(()=> {

        })
    },
        assignEmployee(caseId){
            jQuery('#exampleModal').modal('show');
            this.form.fill(caseId);
            axios.get("api/case/"+caseId).then(( { data }) => (this.cases = data.data) );
        },
        loadCases(){
            axios.get("api/case").then(( { data }) => (this.cases = data.data) );
        },
        loadEmployee(){
             axios.get("api/employee").then(( { data }) => (this.employees = data.data) );
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
                        this.form.delete('api/case/'+id).then(()=>{
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                    }).catch(()=>{
                        Swal.fire(
                            'Failed!',
                            'There was something wrong',
                            'warning'
                        )
                    });
                }
            })
        }
    }
        ,
        created() {
            this.loadCases();
            this.loadEmployee();
        }
    }
</script>
