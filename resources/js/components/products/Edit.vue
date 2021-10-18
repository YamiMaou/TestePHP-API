<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Atualizar Produto</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
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
    name:"update-product",
    data(){
        return {
            
            categories:[],
            product:{
                name:"",
                category_id: 0,
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showproduct();
        this.getCategories();
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

        async getProducts(){
            await this.axios.get('/api/product').then(response=>{
                this.products = response.data
            }).catch(error=>{
                console.log(error)
                this.products = []
            })
        },
        async showproduct(){
            await this.axios.get(`/api/product/${this.$route.params.id}`).then(response=>{
                const { name, category_id } = response.data
                this.product.name = name
                this.product.category_id = category_id
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/product/${this.$route.params.id}`,this.product).then(response=>{
                this.$router.push({name:"productList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>