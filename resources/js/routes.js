export default [
    {
        path: '/bigcommerce',
        component: require('./views/Dashboard').default,
        name: 'bigcommerce',
        meta: {
            layout: 'admin'
        }
    },
    {
        path: '/bigcommerce/categories',
        component: require('./views/Categories/Index').default,
        name: 'bigcommerce.categories',
        meta: {
            layout: 'admin'
        }
    },
    {
        path: '/bigcommerce/categories/:id',
        component: require('./views/Categories/View').default,
        name: 'bigcommerce.categories.view',
        props(route) {
            const props = { ...route.params }
            props.id = +props.id
            return props
        },
        meta: {
            layout: 'admin'
        }
    },
    {
        path: '/bigcommerce/products',
        component: require('./views/Products/Index').default,
        name: 'bigcommerce.products',
        meta: {
            layout: 'admin'
        }
    },
    {
        path: '/bigcommerce/products/:id',
        component: require('./views/Products/View').default,
        name: 'bigcommerce.products.view',
        props(route) {
            const props = { ...route.params }
            props.id = +props.id
            return props
        },
        meta: {
            layout: 'admin'
        }
    }
]