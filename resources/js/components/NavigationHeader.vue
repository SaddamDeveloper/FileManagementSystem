<template>
        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search" v-on:keyup="search()" v-text="queryString" @input="queryString = $event.target.value" v-model="queryString">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <i class="fa fa-user"> {{ name }}</i>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link">
                                <a class="nav-link" href="#" @click="logout"><i class="fa fa-power-off"> Logout</i></a>
                             </a>
                            <!-- <form id="logout-form" method="POST" style="display: none;">
                             @csrf
                         </form> -->

                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
</template>

<script>
    export default {
        data(){
            return{
                name:'',
                queryString: '',
                searchAnythingData:[],
            }
        },
        created(){
        this.fetchUser();
        },
        methods: {
        fetchUser(){
        const token = localStorage.getItem('token');
        fetch('/api/auth/me?token=' +token)
                .then(res=>res.json())
                .then(data => {
                    // this.user = data
                    this.name = data.name;
                })
            },
            logout(){
                const token = localStorage.getItem('token');
                fetch('/api/auth/logout?token='+token, {
                    method: 'post',
                    headers: {
                    'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.$router.push({ path: '/', redirect: '/' })
                    location.reload();
                })

            },
            search(){
                this.searchAnythingData = [];
                const token = localStorage.getItem('token');
                if(this.queryString){
                     axios.get('api/searchanything?token='+token, {params: {queryString:this.queryString}}).then(res =>  {
                      res.data.forEach((Detail) =>  {
                            this.searchAnythingData.push(Detail);
                            
                        })
                    })
                }
            }
        }
    }
</script>
