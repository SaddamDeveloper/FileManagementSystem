<template>
    <div class="container-fluid">
        <search v-if="this.searchResult"></search>
        <div v-if="!this.searchResult">
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1><strong>Waiting for Approve</strong></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">For Approval Case</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Assigned Case</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#Case</th>
                                        <th scope="col">Assigned Employee</th>
                                        <th scope="col">Helper</th>
                                        <th scope="col">Case Docs</th>
                                        <th scope="col">Remarks</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tr v-for="item in approvalcases" :key="item.id">
                                    <td>{{ item.caseid }}</td>
                                    <td><input type="hidden" :value="item.employee_id">{{ item.name }}</td>
                                    <td>{{ item.helper }}</td>
                                    <td><button type="button" class="btn btn-sm" data-toggle="modal"
                                            :data-target="'#exampleModals1'+item.caseid" @click="showFile(item)"><i
                                                class="fa fa-file"></i></button></td>
                                    <td>{{ remarks }}</td>
                                    <td>
                                        <div class="alert alert-primary alert-sm">NA</div>
                                    </td>
                                    <td class="btn-group"><button type="button" class="btn btn-success btn-sm"
                                            @click="confirmApprove(item)"><i class="fa fa-check"></i></button><button
                                            type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            :data-target="'#exampleModal'+item.caseid"><i
                                                class="fa fa-ban"></i></button><button type="button"
                                            class="btn btn-primary btn-sm" data-toggle="modal"
                                            :data-target="'#exampleModals'+item.caseid"><i
                                                class="fa fa-share-square-o"></i></button></td>
                                    <!-- Modal -->
                                    <div class="modal fade" :id="'exampleModal'+item.caseid" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Reason for Rejection
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form @submit.prevent="RejectCase(item)">
                                                    <div class="modal-body">
                                                        <table class="table table-resonsive table-bordered">
                                                            <tr>
                                                                <thead>Remarks</thead>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" name="rejectcause"
                                                                        v-model="rejectCause.msg" class="form-control">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Reject</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" :id="'exampleModals'+item.caseid" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Send for Approval
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form @submit.prevent="sendToApprovalAgain(item)">
                                                    <div class="modal-body">
                                                        <table class="table table-resonsive table-bordered">
                                                            <tr>
                                                                <thead>Send for Approval</thead>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <select v-model="toApprovalAgain.employee_id"
                                                                        class="form-control" v-if="item.caseid">
                                                                        <option v-for="employee in employees"
                                                                            v-bind:key="employee.id"
                                                                            :value="employee.employee_id">{{
                                                                            employee.name }}</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Send</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" :id="'exampleModals1'+item.caseid" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Documents</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                                    <li v-for="data in files" v-bind:key="data.id"><a
                                                                            :href="'./storage/'+item.caseid+'/'+data.docs"
                                                                            download>{{ data.docs }}</a></li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul>
                                                                    <li> <a :href="'./storage/'+item.caseid+'/'+item.docs"
                                                                            download>{{ item.docs }}</a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
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
    </div>

</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css">

</style>
<script>
export default {
    data() {
        return {
            searchResult: '',
            value: null,
            time1: '',
            time2: '',
            time3: '',
            // custom lang
            lang: 'en',
            docs: '',
            remarks: '',
            files: [],
            approvalcases: [],
            employees: [],
            toApproval: {
                caseid: '',
                employee_id: ''
            },
            rejectCause: {
                caseid: '',
                employee_id: '',
                msg: ''
            },
            toApprovalAgain: {
                caseid: '',
                employee_id: '',
                helper: [],
                docs: '',
                fileName: ''
            }
        }
    },
    created() {
        this.fetchCases();
        this.loadEmployee();
        this.fetchFiles();
        const token = localStorage.getItem('token');
        Event.$on("searching", inputWord => {
            axios.get('/api/search?q=' + inputWord + '&token=' + token)
                .then((data) => {
                    this.searchResult = data.data;
                    // import('./MyComponent.vue')
                    // Vue.component('search', require('../components/Search.vue').default);
                })
        })
    },
    methods: {
        fetchCases(page_url) {
            const token = localStorage.getItem('token');
            page_url = page_url || 'api/aprovedcases?token=' + token;
            let vm = this;
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.approvalcases = res.data;
                    vm.makePagination(res.meta, res.links);
                })
        },
        makePagination(meta, links) {
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            }
            this.pagination = pagination;
        },
        confirmApprove(item) {
            Swal.fire({
                title: 'Do you want to Approve?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Approve it!'
            }).then((result) => {
                if (result.value == true) {
                    this.toApproval.caseid = item.caseid;
                    this.toApproval.employee_id = item.employee_id;
                    const token = localStorage.getItem('token');
                    fetch(`api/sendapproval?token=` + token, {
                        method: 'post',
                        body: JSON.stringify(this.toApproval),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    fetch(`api/sendapproval/${item.caseid}?token=` + token, {
                        method: 'delete'
                    })
                        .then(res => {
                            this.fetchCases()
                        }
                        )
                        .then(res => res.json())
                        .then(res => {
                            this.toApproval.caseid = '';
                            this.toApproval.employee_id = '';
                            jQuery('#exampleModal' + item.caseid).modal('hide');
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
        RejectCase(item) {
            this.rejectCause.caseid = item.caseid;
            this.rejectCause.employee_id = item.employee_id;

            Swal.fire({
                title: 'Do you want to Reject?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Reject it!'
            }).then((result) => {
                if (result.value) {
                    this.rejectCause.caseid = item.caseid;
                    this.rejectCause.employee_id = item.employee_id;
                    const token = localStorage.getItem('token');
                    fetch(`api/rejectcase?token=` + token, {
                        method: 'post',
                        body: JSON.stringify(this.rejectCause),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    fetch(`api/rejectcase/${item.caseid}?token=` + token, {
                        method: 'delete'
                    })
                    this.fetchCases()
                        .then(res => res.json())
                        // .then(res => {
                        // jQuery('#exampleModal'+this.rejectCause.caseid).modal('hide');
                        //     })
                        .then(Swal.fire(
                            'Rejected!',
                            'Case Has been Rejecred!',
                            'success'
                        ))
                        .catch(err => console.log(err))
                }
            })
        },
        loadEmployee() {
            const token = localStorage.getItem('token');
            axios.get("api/employees?token=" + token).then(({ data }) => (this.employees = data));
        },
        sendToApprovalAgain(item) {
            this.toApprovalAgain.caseid = item.caseid;
            this.toApprovalAgain.docs = item.docs;
            this.toApprovalAgain.helper = item.helper;
            this.toApprovalAgain.fileName = item.fileName;
            const token = localStorage.getItem('token');
            fetch(`api/sendforapprovalagain?token=` + token, {
                method: 'post',
                body: JSON.stringify(this.toApprovalAgain),
                headers: {
                    'content-type': 'application/json'
                }
            })
            fetch(`api/rejectcase/${item.caseid}?token=` + token, {
                method: 'delete'
            })
            this.fetchCases()
                .then(res => res.json())
                .then(res => {
                    this.toApprovalAgain.employee_id = '';
                    this.toApprovalAgain.caseid = '';
                    Swal.fire(
                        'Sent!',
                        'Case Has been Sent to',
                        'success'
                    )

                    jQuery('#exampleModal' + this.toApprovalAgain.caseid).modal('hide')
                })
                .catch(err => console.log(err));
        },
        fetchFiles() {
            const token = localStorage.getItem('token');
            fetch('api/fetchfiles?token=' + token)
                .then(res => res.json())
                .then(res => {
                    this.docs = res.data[0].docs;
                    this.remarks = res.data[0].remarks;
                });
        },
        showFile(item) {
            const token = localStorage.getItem('token');
            fetch('api/showuploadedfile/' + item.caseid + '?token=' + token)
                .then(res => res.json())
                .then(res => {
                    this.files = res
                })
        }
    }
}
</script>
