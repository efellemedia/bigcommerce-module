<template>
    <div>
        <portal to="title">
            <app-title icon="paper-plane">BigCommerce - Products</app-title>
        </portal>

        <div class="row">
            <div class="content-container">
                <p-table :endpoint="endpoint" id="products" sort-by="name" primary-key="id" key="products_table">

                    <template slot="name" slot-scope="table">
                        <p-status :value="table.record.is_visible" class="mr-2"></p-status>

                        <router-link :to="{ name: 'bigcommerce.products.view', params: {id: table.record.id} }">{{ table.record.name }}</router-link>
                    </template>

                    <template slot="is_featured" slot-scope="table">
                        <span class="badge badge--success" v-if="table.record.is_featured === 1">Featured</span>
                        <span v-else></span>
                    </template>

                    <template slot="actions" slot-scope="table">
                        <p-actions :id="'product_' + table.record.id + '_actions'" :key="'product_' + table.record.id + '_actions'">
                            <p-dropdown-link :to="{ name: 'bigcommerce.products.view', params: {id: table.record.id} }">View</p-dropdown-link>
                        </p-actions>
                    </template>

                </p-table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        head: {
            title() {
                return {
                    inner: 'Products'
                }
            }
        },

        data() {
            return {
                endpoint: '/datatable/bigcommerce/products',
            }
        }
    }
</script>