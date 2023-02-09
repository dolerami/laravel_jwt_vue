<template>
    <div>
        <router-link :to="{name: 'fruit.index'}" style="margin-left:5px">List</router-link>
        <router-link v-if="!token" :to="{name: 'user.login'}" style="margin-left:5px">Login</router-link>
        <router-link v-if="!token" :to="{name: 'user.registration'}" style="margin-left:5px">Registration</router-link>
        <router-link v-if="token" :to="{name: 'user.personal'}" style="margin-left:5px">Personal</router-link>
        <a href="#" v-if="token" @click.prevent="logout" style="margin-left:5px">Logout</a>
        <router-view></router-view>
    </div>
</template>

<script>
import API from "../api";

export default {
    name: "Index",
    data(){
        return{
            token: null
        }
    },
    watch:{
        currentRoute:{
            handler(value){
                this.getToken()
            },
            immediate:true
        }
    },
    mounted(){
      this.getToken()
    },
    methods:{
        getToken(){
            this.token = localStorage.getItem('token')
        },
        logout(){
            API.post('/api/auth/logout')
            .then(res =>{
                localStorage.removeItem('token');
                this.$router.push({name: 'user.login'})
            })
        }
    },
    computed:{
        currentRoute(){
            return this.$route.name
        }
    }
}
</script>

<style scoped>

</style>
