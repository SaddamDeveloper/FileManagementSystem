<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create GST rate
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                                <input class="form-control" type="number">
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
