const Welcome = () =>
    import ('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */ )
const CategoryList = () =>
    import ('./components/category/List.vue' /* webpackChunkName: "resource/js/components/category/list" */ )
const CategoryCreate = () =>
    import ('./components/category/Add.vue' /* webpackChunkName: "resource/js/components/category/add" */ )
const CategoryEdit = () =>
    import ('./components/category/Edit.vue' /* webpackChunkName: "resource/js/components/category/edit" */ )

const ProductList = () =>
    import ('./components/products/List.vue');
const ProductEdit = () =>
    import ('./components/products/Edit.vue');
const ProductCreate = () =>
    import ('./components/products/Add.vue');



export const routes = [{
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'categoryList',
        path: '/category',
        component: CategoryList
    },
    {
        name: 'categoryEdit',
        path: '/category/:id/edit',
        component: CategoryEdit
    },
    {
        name: 'categoryAdd',
        path: '/category/add',
        component: CategoryCreate
    },
    {
        name: 'productList',
        path: '/product',
        component: ProductList
    },
    {
        name: 'productEdit',
        path: '/product/:id/edit',
        component: ProductEdit
    },
    {
        name: 'productAdd',
        path: '/product/add',
        component: ProductCreate
    }
]