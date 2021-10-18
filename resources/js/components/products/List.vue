<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"productAdd"}' class="btn btn-primary">Adicionar</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Produtos</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>categoria</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody v-if="products.length > 0">
                                <tr v-for="(product,key) in products" :key="key">
                                    <td>{{ product.id }}</td>
                                    <td>{{ product.name }}</td>
                                    <td>{{ product.category.name }}</td>
                                    <td>
                                        <router-link :to='{name:"productEdit",params:{id:product.id}}' class="btn btn-success">Editar</router-link>
                                        <button type="button" @click="deleteProduct(product.id)" class="btn btn-danger">Deletar</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">Não Há Produtos</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"products",
    data(){
        return {
            products:[]
        }
    },
    mounted(){
        this.getProducts()
    },
    methods:{
        async getProducts(){
            await this.axios.get('/api/product').then(response=>{
                this.products = response.data
            }).catch(error=>{
                console.log(error)
                this.products = []
            })
        },
        deleteProduct(id){
            if(confirm("Deseja realmente deletar este registro?")){
                this.axios.delete(`/api/product/${id}`).then(response=>{
                    this.getProducts()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>