import axios from "axios";
import router from "./router";

const api = axios.create();

//start request

api.interceptors.request.use(
    config => {
        if (localStorage.getItem('token')){
            config.headers.authorization = `Bearer ${localStorage.getItem('token')}`
        }
        return config
    },
    error => {
        console.log(22222222222222);
    }
);

//end request

//start response

api.interceptors.response.use(
    config => {
        if (localStorage.getItem('token')) {
            config.headers.authorization = `Bearer ${localStorage.getItem('token')}`
        }
        return config
    },
    error => {
        if(error.response.data.message === 'Token has expired'){
            return axios.post('api/auth/refresh', {}, {
                headers:{
                    'authorization': `Bearer ${localStorage.getItem('token')}`
                }
            }).then(res => {
                localStorage.setItem('token', res.data.authorisation.token)

                error.config.headers.authorization = `Bearer ${res.data.authorisation.token}`

                return api.request(error.config)
            })
        }
        if(error.response.status === 401){
            router.push({name: 'user.login'})
        }
    }
);

//end response

export default api;
