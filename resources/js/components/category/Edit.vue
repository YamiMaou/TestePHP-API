<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Atualizar Categoria</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" v-model="category.name">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"update-category",
    data(){
        return {
            category:{
                name:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showCategory()
    },
    methods:{
        async showCategory(){
            await this.axios.get(`/api/category/${this.$route.params.id}`).then(response=>{
                const { name } = response.data
                this.category.name = name
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/category/${this.$route.params.id}`,this.category).then(response=>{
                this.$router.push({name:"categoryList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>