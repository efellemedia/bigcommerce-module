<template>
    <div>
        <portal to="title">
            <app-title icon="paper-plane">BigCommerce - Categories</app-title>
        </portal>

        <div class="row">
            <div class="content-container">
                <p-table :endpoint="endpoint" id="categories" sort-by="name" primary-key="id" key="categories_table">

                    <template slot="name" slot-scope="table">
                        <p-status :value="table.record.is_visible" class="mr-2"></p-status>

                        <router-link :to="{ name: 'bigcommerce.categories.view', params: {id: table.record.id} }">{{ table.record.name }}</router-link>
                    </template>

                    <template slot="image_url" slot-scope="table">
                        <img v-if="table.record.image_url" :src="table.record.image_url" :alt="table.record.name" class="h-16" />
                        <img v-else src="/img/image-small.svg" :alt="table.record.name" class="h-16" />
                    </template>

                    <template slot="description" slot-scope="table">
                        <span class="text-gray-800 text-sm" :inner-html.prop="table.record.description | truncate"></span>
                    </template>

                    <template slot="actions" slot-scope="table">
                        <p-actions :id="'category_' + table.record.id + '_actions'" :key="'category_' + table.record.id + '_actions'">
                            <p-dropdown-link :to="{ name: 'bigcommerce.categories.view', params: {id: table.record.id} }">View</p-dropdown-link>
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
                    inner: 'Categories'
                }
            }
        },

        data() {
            return {
                endpoint: '/datatable/bigcommerce/categories',
            }
        },

        filters: {
            truncate(value, length = 150) {
                return _.truncate(value, { 'length': length });
            }
        }
    }
</script>