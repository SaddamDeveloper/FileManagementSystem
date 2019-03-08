<template>
    <div class="container-fluid">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>Create Type of Work</strong></h1>
                    </div>
                </div>
            </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Create Type of Work</li>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create Type of Work
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input id="name" name="name" type="text" class="form-control" placeholder="Name of Types of Work">
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
