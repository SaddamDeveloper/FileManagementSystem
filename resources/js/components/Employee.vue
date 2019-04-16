<template>
    <div class="container">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Create Employee</strong></h1>
                    </div>
                </div>
            </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Create Employee</li>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form @submit.prevent="addEmployee">
                    <div class="card">
                        <div class="card-header">
                            Create Employee
                        </div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="name" name="name" type="text" v-model="employee.name" class="form-control" placeholder="Employee Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <input id="no" name="no" type="text" class="form-control" v-model="employee.no" placeholder="Contact No">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="email" name="email" type="text" class="form-control" v-model="employee.email" placeholder="Email" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <input id="designation"  name="designation" type="text" class="form-control" v-model="employee.designation" placeholder="Designation">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <select name="select[]" placeholder="Area of Expertise" id="multiple-select" multiple="" class="form-control" v-model="employee.select">
                                    <option value="it">IT</option>
                                    <option value="banking">Banking</option>
                                    <option value="accounting">Accounting</option>
                                    <option value="boffice">Back Office</option>
                                    <option value="5">Peon</option>
                                    <option value="6">Project Manager</option>
                                    <option value="7">Software</option>
                                    <option value="8">Business Standard</option>
                                    <option value="9">Option #9</option>
                                    <option value="10">Option #10</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <textarea id="address" name="address" type="text" v-model="employee.address" class="form-control" placeholder="Address"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div style="float: right;">
                            <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                            </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Employees</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">No</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Designation</th>
                                  <th scope="col">Expertise</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            <tr v-for="employee in employees" v-bind:key="employee.id">
                              <td>{{ employee.id }}</td>
                              <td>{{ employee.name }}</td>
                              <td>{{ employee.no }}</td>
                              <td>{{ employee.email }}</td>
                              <td>{{ employee.designation }}</td>
                              <td>{{ employee.expertise }}</td>
                              <td><button type="button"  class="btn btn-primary btn-sm" @click="editEmployee(employee)"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger btn-sm" @click="deleteEmployee(employee.id)"><i class="fa fa-trash"></i></button></td>
                          </tr>
                      </tbody>
                  </table>
                        </div>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchEmployees(pagination.prev_page_url)">Previous</a></li>
                            <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                            <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchEmployees(pagination.next_page_url)">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
</template>

// <script>
//     export default {
//         data () {
//     return {
//         employees: {},
//         form: new Form({
//         name: '',
//         no: '',
//         email: '',
//         designation: '',
//         select:[],
//         address: '',
//       })
//     }
// },
// methods: {
//     loadEmployees(){
//             axios.get("api/employee").then(( { data }) => (this.employees = data.data) );
//         },
//         createEmployee(){
//         this.$Progress.start();
//         this.form.post('api/employee')
//                 .then(()=>{
//         toast.fire({
//             type: 'success',
//             title: 'Saved successfully'
//         })
//             this.$Progress.finish();
//         })
//         .catch(()=> {

//         })
//     },
// },
//         created() {
//             this.loadEmployees();
//         }
//     }
// </script>
<script>
export default {
    data (){
        return {
            employees: [],
            employee: {
                id: '',
                name: '',
                no: '',
                email: '',
                designation: '',
                select: [],
                address: ''
            },
            employee_id: '',
            pagination: {},
            edit: false
        }
    },
    created(){
        this.fetchEmployees();
    },
    methods: {
        fetchEmployees(page_url){
            let vm = this;
            page_url = page_url || 'api/employees';
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.employees = res.data;
                vm.makePagination(res.meta, res.links);
            })
            .catch(err => console.log(err));
        },
        makePagination(meta, links){
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            };
            this.pagination = pagination;
        },
        deleteEmployee(id){
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
                    fetch(`api/employee/${id}`, {
                        method: 'delete'
                    })
                    .then(()=>{
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        this.fetchEmployees();
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
        addEmployee(){
            if(this.edit === false){
                //Add
                fetch(`api/employee`, {
                    method: 'post',
                    body: JSON.stringify(this.employee),
                     headers: {
                    'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.employee.id = '';
                    this.employee.name = '';
                    this.employee.no = '';
                    this.employee.email = '';
                    this.employee.designation = '';
                    this.employee.expertise = '';
                    this.employee.address = '';
                    alert("Employee Added");
                    this.fetchEmployees();
                })
                .catch(err => console.log(err))
            }
            else{
                //Update
                fetch(`api/employee`, {
                    method: 'put',
                    body: JSON.stringify(this.employee),
                     headers: {
                    'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.employee.id = '';
                    this.employee.name = '';
                    this.employee.no = '';
                    this.employee.email = '';
                    this.employee.designation = '';
                    this.employee.expertise = '';
                    this.employee.address = '';
                    alert("Employee Updated");
                    this.fetchEmployees();
                })
                .catch(err => console.log(err))
            }
        },
        editEmployee(employee){
            this.edit = true;
            this.employee.id = employee.id;
            this.employee.employee_id = employee.id;
            this.employee.name = employee.name;
            this.employee.no = employee.no;
            this.employee.email = employee.email;
            this.employee.designation = employee.designation;
            this.employee.expertise = employee.expertise;
            this.employee.address = employee.address;
        }
    }
}
</script>

