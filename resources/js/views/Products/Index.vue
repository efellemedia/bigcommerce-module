<template>
    <div>
        <portal to="title">BigCommerce Products</portal>

        <div class="row">
            <div class="content-container">
                <p-datatable name="products" sort-by="name" :endpoint="endpoint" :per-page="10">

                    <template slot="is_featured" slot-scope="table">
                        <span class="badge badge--success" v-if="table.record.is_featured === 1">Featured</span>
                        <span v-else></span>
                    </template>

                    <template slot="is_visible" slot-scope="table">
                        <span class="badge badge--success" v-if="table.record.is_visible === 1">Visible</span>
                        <span class="badge badge--danger" v-else>Hidden</span>
                    </template>

                    <template slot="actions" slot-scope="table">
                        <p-button @click="pushRoute('bigcommerce.products.view', { id: table.record.id })">View</p-button>
                    </template>

                </p-datatable>
            </div>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash'

    export default {
        data() {
            return {
                endpoint: '/datatable/bigcommerce/products',
            }
        },

        methods: {
            pushRoute: function(name, params = {}) {
                Fusion.router.push({ name, params })
            }
        }
    }
</script>