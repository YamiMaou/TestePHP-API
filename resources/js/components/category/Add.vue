<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Adicionar Categoria</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" v-model="category.name">
                                </div>
                            </div>
                           
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Gravar</button>
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
    name:"add-category",
    data(){
        return {
            category:{
                name:"",
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/category',this.category).then(response=>{
                this.$router.push({name:"categoryList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>