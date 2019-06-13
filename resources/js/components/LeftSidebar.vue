<template>
   <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/dashboard"><img src="sufeeadmin/images/logo4.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="/dashboard"><img src="sufeeadmin/images/logo2.png" alt="Logo"></a>
        </div>
        <br>
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <router-link to="/dashboard"><i class="fa fa-dashboard"></i> Dashboard </router-link>
                    <router-link to="/verifyemployee" v-if="users.selected == 2"><i class="fa fa-check"></i> Verify Employee </router-link>
                </li>
                <li class="active">
                    <router-link to="/newcase" v-if="users.selected == 0"> <i class="fa fa-info-circle"></i> Register</router-link>
                    <router-link to="/employee" v-if="users.selected == 1"> <i class="fa fa-user-plus"></i> Create Employee</router-link>
                </li>
                <li class="active">
                    <router-link to="/collectionregister" v-if="users.selected == 0"> <i class="fa fa-registered"></i> Collection Register</router-link>
                    <router-link to="/collectionregister" v-if="users.selected == 1"> <i class="fa fa-registered"></i> Collection Register</router-link>
                </li>
            </ul>
        </div>
    </nav>
</aside>
</template>

<script>
    export default {
       data(){
           return{
               users: {
                   email: '',
                   selected: ''
               }
           }
       },
       created() {
           this.fetchUser()
       },
       methods: {
        fetchUser(){
        const token = localStorage.getItem('token');
        fetch('/api/auth/me?token=' +token)
                .then(res=>res.json())
                .then(data => {
                    this.users.email = data.email;
                    this.users.selected = data.selected;
                })
        }
        }
    }
</script>
