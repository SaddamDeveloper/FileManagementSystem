<template>
<div class="container">
        <center><span class="text text-danger">{{error}}</span></center>
    <form @submit.prevent="login">
    Select Role
        <div class="dropdown">
        <select class="form-control" name="role" v-model="users.selected">
            <option>Select Role</option>
            <option value="1">Admin</option>
            <option value="0">User</option>
            <option value="2">Employee</option>
        </select>
        </div>
        <div class="form-group">
           <label for="email">email</label>
            <input type="email" id="email" class="form-control" name="email" v-model="users.email" required>
        </div>
        <div class="form-group">
           <label for="password">Password</label>
            <input type="password" id="password" class="form-control" name="password" v-model="users.password" required>
        </div>
        <button class="btn btn-primary pull-right" type="submit">Login</button>
    </form>
</div>
</template>
<script>
export default {
    data(){
        return{
            error:'',
            users: {
                selected:'',
                email:'',
                password:''
            }
        }
    },
        methods: {
           login(){
        if(this.users.selected == 1){
            console.log("this is admin")
               fetch('api/auth/login', {
                method: 'post',
                body: JSON.stringify(this.users),
                headers: {
                            'content-type': 'application/json'
                        }
                })
                .then(res => res.json())
                .then(
                    (response)  =>  {

                            this.error = response.error;
                            const token = response.access_token;
                            const base64Url = token.split('.')[1];
                            const base64 = base64Url.replace('-', '+').replace('_', '/');
                            // console.log(JSON.parse(window.atob(base64)));
                            localStorage.setItem('token', token);
                            this.$router.push({ path: '/dashboard', redirect: '/dashboard' })
                            location.reload();
                    })
                .catch(
                    (error) =>  console.log(error)
                );

               }
               else if(this.users.selected == 0){
               fetch('api/auth/login', {
                method: 'post',
                body: JSON.stringify(this.users),
                headers: {
                            'content-type': 'application/json'
                        }
                })
                .then(res => res.json())
                .then(
                    (response)  =>  {

                            this.error = response.error;
                            const token = response.access_token;
                            const base64Url = token.split('.')[1];
                            const base64 = base64Url.replace('-', '+').replace('_', '/');
                            // console.log(JSON.parse(window.atob(base64)));
                            localStorage.setItem('token', token);
                            this.$router.push({ path: '/dashboard', redirect: '/dashboard' })
                            location.reload();
                    })
                .catch(
                    (error) =>  console.log(error)
                );

               }
               else if(this.users.selected == 2){
               fetch('api/auth/login', {
                method: 'post',
                body: JSON.stringify(this.users),
                headers: {
                            'content-type': 'application/json'
                        }
                })
                .then(res => res.json())
                .then(
                    (response)  =>  {

                            this.error = response.error;
                            const token = response.access_token;
                            const base64Url = token.split('.')[1];
                            const base64 = base64Url.replace('-', '+').replace('_', '/');
                            // console.log(JSON.parse(window.atob(base64)));
                            localStorage.setItem('token', token);
                            this.$router.push({ path: '/dashboard', redirect: '/dashboard' })
                            location.reload();
                    })
                .catch(
                    (error) =>  console.log(error)
                );

               }
               else{
                   this.error = 'Please select Role';
               }
           }
        },
    }
</script>

