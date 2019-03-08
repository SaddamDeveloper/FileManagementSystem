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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create Employee
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="name" name="name" type="text" class="form-control" placeholder="Employee Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <input id="no" name="no" type="text" class="form-control" placeholder="Contact No">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="name" name="name" type="text" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <input id="no" name="no" type="text" class="form-control" placeholder="Designation">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                               <select name="multiple-select" placeholder="Area of Expertise" id="multiple-select" multiple="" class="form-control">
                                <option value="1">IT</option>
                                <option value="2">Banking</option>
                                <option value="3">Accounting</option>
                                <option value="4">Back Office</option>
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
                                <textarea id="no" name="no" type="text" class="form-control" placeholder="Address"></textarea>
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
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
