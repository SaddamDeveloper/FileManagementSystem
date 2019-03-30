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
                <form @submit.prevent="createEmployee" @keydown="form.onKeydown($event)">
                <div class="card">
                    <div class="card-header">
                        Create Employee
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="name" v-model="form.name" name="name" type="text" class="form-control" placeholder="Employee Name" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <input id="no" v-model="form.no" name="no" type="text" class="form-control" placeholder="Contact No" :class="{ 'is-invalid': form.errors.has('no') }">
                                <has-error :form="form" field="no"></has-error>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="email" v-model="form.email" name="email" type="text" class="form-control" placeholder="Email" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <input id="designation" v-model="form.designation" name="designation" type="text" class="form-control" placeholder="Designation" :class="{ 'is-invalid': form.errors.has('designation') }">
                                <has-error :form="form" field="designation"></has-error>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                               <select name="select[]" v-model="form.select" placeholder="Area of Expertise" id="multiple-select" multiple="" class="form-control" :class="{ 'is-invalid': form.errors.has('select') }">
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
                            <has-error :form="form" field="select"></has-error>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <textarea id="address" v-model="form.address" name="address" type="text" class="form-control" placeholder="Address"></textarea>
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
                              </tr>
                          </thead>
                          <tbody>
                            <tr v-for="item in employees" :key="item.id">
                              <td>{{ item.id }}</td>
                              <td>{{ item.name }}</td>
                              <td>{{ item.no }}</td>
                              <td>{{ item.email }}</td>
                              <td>{{ item.designation }}</td>
                              <td>{{ item.Expertise }}</td>
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
        data () {
    return {
        employees: {},
        form: new Form({
        name: '',
        no: '',
        email: '',
        designation: '',
        select:[],
        address: '',
      })
    }
},
methods: {
    loadEmployees(){
            axios.get("api/employee").then(( { data }) => (this.employees = data.data) );
        },
        createEmployee(){
        this.$Progress.start();
        this.form.post('api/employee')
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
},
        created() {
            this.loadEmployees();
        }
    }
</script>
