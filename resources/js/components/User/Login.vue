<template>
    <div class="w-25">
        <input v-model="email" type="email" class="form-control mt-3 mb-3" placeholder="Email">
        <input v-model="password" type="password" class="form-control mb-3" placeholder="Password">
        <input @click.prevent="login" type="submit" class="btn btn-primary">
    </div>
</template>

<script>
export default {
    name: "Login",
    data(){
        return{
            email: null,
            password: null
        }
    },

    methods:{
        login(){
            axios.post('/api/auth/login', {email: this.email, password: this.password})
            .then(res => {
                localStorage.setItem('token', res.data.authorisation.token)
                // const data={
                //     name: 'token',
                //     token: res.data.authorisation.token
                // }
                // localStorage.setItem('access_token', JSON.stringify(data))
                //
                // console.log(JSON.parse(localStorage.getItem('access_token')))
                // Good method to safe the token as an object
                this.$router.push({name: 'user.personal'})
            })
        }
    }
}
</script>

<style scoped>

</style>
