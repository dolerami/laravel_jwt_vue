<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="fruit in fruits">
                <th scope="row">{{ fruit.id}}</th>
                <td>{{ fruit.name }}</td>
                <td>{{ fruit.price }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import API from "../../api";

export default {
    name: "Index",
    data() {
        return {
            fruits: null
        }
    },
    mounted() {
        this.getFruits()
    },
    methods:{
        getFruits(){
            // axios.get('/api/auth/fruits', {
            //     headers: {
            //         'authorization': `Bearer ${localStorage.getItem('token')}`
            //     }
            // })
            //
            // .then(res => {
            //     // this.fruits = res.data.data
            // })
            //     Էսպիսի տարբերակ էլ կա կոնկրետ էս աքսիոսում տոկենը գրելու, բայց քանի որ մենք ուզում ենք բոլոր աքսիոսների համար տոկենն աշխատի, կանենք այլ կերպ։
            //     Նախ դատայում կավելացնենք նոր փոփոխական` api: null:
            //     Հետո mounted-ում կավելացնենք this.initApi() ֆունկցիան
            //     Հետո արդեն մեթոդներում կգրենք initApi() ֆունկցիան։ Բայց քանի որ ավելի հարմար է առանձին js ֆայլ ունենալ, մենք նոր՝ api.js  ֆայլում կգրենք բոլոր ֆունկցիաներն ու դրանց աշխատանքը, իսկ էստեղից initApi()-ն ու api դատան կջնջենք
            API.get('/api/auth/fruits')
            .then(res => {
                this.fruits = res.data.data
            })
        }
    }
}
</script>

<style scoped>

</style>
