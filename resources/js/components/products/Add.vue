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
                                    <input type="text" class="form-control" v-model="product.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Categoria</label>

                                    <select class="form-control" v-model="product.category_id">
                                        <option v-for="cat in categories" :value="cat.id">{{cat.name}}</option>
                                    </select>
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
    name:"add-product",
    data(){
        return {
            categories:[],
            product:{
                name:"",
                category_id: 0
            }
        }
    },
     mounted(){
        this.getCategories()
    },
    methods:{
        async getCategories(){
            await this.axios.get('/api/category').then(response=>{
                this.categories = response.data
            }).catch(error=>{
                console.log(error)
                this.categories = []
            })
        },
        async create(){
            await this.axios.post('/api/product',this.product).then(response=>{
                this.$router.push({name:"productList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>