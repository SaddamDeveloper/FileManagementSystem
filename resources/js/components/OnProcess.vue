<template>
    <div class="container-fluid">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>On Process Case</strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">On Process Case</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">On Process Case</strong>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#Case</th>
                            <th scope="col">Assigned Employee</th>
                            <th scope="col">Client</th>
                            <th scope="col">TOW</th>
                            <th scope="col">Delivery Date</th>
                            <th scope="col">Helper</th>
                            <th scope="col">Docs</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in assignedemployees" v-bind:key="item.caseid">
                        <td>{{ item.caseid }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.clientName }}</td>
                        <td>{{ item.typeofwork }}</td>
                        <td>{{ item.time2 }}</td>
                        <td>{{ item.helper }}</td>
                        <td>
                            <button type="button" class="btn btn-sm" data-toggle="modal" :data-target="'#exampleModals1'+item.caseid" @click="showFile(item)"><i class="fa fa-file"></i></button>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" :data-target="'#exampleModal'+item.caseid"><i class="fa fa-plus"></i></button>
                        </td>
                        <td> NA </td>
                        <td><button type="button" @click="sendToAdmin(item)" class="btn btn-primary btn-sm"><i class="fa fa-send-o"></i></button></td>
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
                <form @submit.prevent="pushToDb(item)">
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Docs</th>
                        </tr>
                        <tr>
                            <td><input type="file" name="docs" @change="processFile"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
                </form>
                </div>
            </div>
        </div>
        <div class="modal fade" :id="'exampleModals1'+item.caseid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Documents</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Docs</th>
                            <th>Admin docs</th>
                        </tr>
                        <tr>
                            <td>
                                <ul>
                                    <li v-for="data in files" v-bind:key="data.id"><a :href="'./storage/'+item.caseid+'/'+data.docs" download>{{ data.docs }}</a></li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li> <a :href="'./storage/'+item.caseid+'/'+item.docs" download>{{ item.docs }}</a></li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>
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
<style>
    .show:hover ul.list-categories{
  max-height: inherit;
  opacity: 1;
}

.list-categories{
  list-style-type: none;
  padding: 0px;
  margin: 0px;
  max-height: 0px;
  opacity: 0;
  overflow: hidden;
  transition: opacity 300ms ease;
}
</style>

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
            assignedemployees: [],
            files: [],
            showUploaded: [],
            remarks: '',
            toDb: {
                docs: '',
                assignedEmployee: '',
                remarks:''
            },
            toAdmin: {
                caseid: '',
                employee_id: '',
                helper: ''
            },
            toOnProcess: {
                caseid: '',
                docs: '',
                employee_id: '',
                helper: ''
            }
        }
    },
    created(){
        this.fetchCases();
        // this.loadEmployee();
        // console.log(this.$refs)
        // console.log(field);
        // this.showUploadedFile();
    },
    methods: {
        fetchCases(page_url){
            const token = localStorage.getItem('token');
            page_url = page_url || 'api/employeeassignedemployees?token='+token;
            let vm = this;
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.assignedemployees = res.data;
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
        showUploadedFile(){
            const token = localStorage.getItem('token');
            fetch('api/checkcaseid?token='+token)
            .then(res => res.json())
            .then(res => {

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
                this.toDb.docs = e.target.result
            }
            this.toDb.fileName = e.target.files[0].name
        },
        pushToDb(id){
            this.toDb.caseid = id.caseid;
            this.toDb.assignedEmployee = id.employee_id;
            const token = localStorage.getItem('token');
                    // this.toOnProcess.caseid = id.caseid;
                    // this.toOnProcess.docs = id.docs;
                    // this.toOnProcess.helper = id.helper;
                    // this.toOnProcess.employee_id = id.employee_id;
                      fetch(`api/sendtodb?token=`+token, {
                        method: 'post',
                        body: JSON.stringify(this.toDb),
                            headers: {
                        'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(res => {
                        if(res.message == 0){
                            alert('Uploaded');
                            jQuery('#exampleModal'+id.caseid).modal('hide');
                        }
                        else{
                            alert('Already Uploaded');
                        }
                    })

        },
        sendToAdmin(id){
            this.toAdmin.caseid = id.caseid;
            this.toAdmin.employee_id = id.employee_id;
            this.toAdmin.helper = id.helper;
            this.toAdmin.docs = id.docs;
            Swal.fire({
            title: 'Are you sure want send to Admin?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, send it!'
            }).then((result) => {
                if (result.value) {
                    const token = localStorage.getItem('token');
                    fetch(`api/sendtoadmin?token=`+token, {
                        method: 'post',
                        body: JSON.stringify(this.toAdmin),
                        headers: {
                            'content-type' : 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then((res)=>{

                        // fetch('api/status?token='+token)
                        // .then(res => res.json())
                        // .then((res) => {
                        //     console.log(res)
                        // })
                        // if(res){
                        //     fetch('api/deleteonprocess/'+id.caseid+'?token='+token, {
                        //     method: 'delete'
                        //      })
                        // }
                        if(res.message == 0){
                            Swal.fire(
                            'Sent!',
                            'Your file has been sent.',
                            'success'
                            )
                        }
                        else if(res.message == 1){
                             Swal.fire(
                            'Sorry!',
                            'You have already sent.',
                            'warning'
                            )
                        }
                        else{
                            Swal.fire(
                        'Failed!',
                        'There was something wrong',
                        'warning'
                    )
                        }
                        this.fetchCases();
                })
                .catch(()=>{
                    Swal.fire(
                        'Failed!',
                        'There was something wrong',
                        'warning'
                    )
                });
                }
            })
        },
        showFile(item){
            const token = localStorage.getItem('token');
             fetch('api/showuploadedfile/'+item.caseid+'?token='+token)
                .then(res=> res.json())
                .then(res => {
                   this.files = res
                })
        }
    }
}
</script>
