<template>
    <form @submit.prevent="signup">
        <div class="form-group">
           <label for="name">UserName</label>
            <input type="text" class="form-control" name="name" v-model="users.name">
        </div>
        <div class="form-group">
           <label for="email">email</label>
            <input type="email" id="email" class="form-control" name="email" v-model="users.email">
        </div>
        <div class="form-group">
           <label for="password">Password</label>
            <input type="password" id="password" class="form-control" name="password" v-model="users.password">
        </div>
        <div class="dropdown">
        Role
        <select class="form-control mb-4" name="role" v-model="users.selected">
            <option value="1">Admin</option>
            <option value="0">User</option>
            <option value="3">Employee</option>
        </select>
        </div>
        <button class="btn btn-primary pull-right" type="submit">Submit</button>
    </form>
</template>
<script>
export default {
    data(){
        return{
            users: {
                name: '',
                email:'',
                password:'',
                selected: ''
            }
        }
    },
        methods: {
            signup()
            {
                fetch('api/user', {
                method: 'post',
                body: JSON.stringify(this.users),
                headers: {
                            'content-type': 'application/json'
                        }
                })
                .then(
                    (response)  =>  console.log(response)
                )
                .catch(
                    (error) =>  console.log(error)
                );
            }
        }
    }
</script>

