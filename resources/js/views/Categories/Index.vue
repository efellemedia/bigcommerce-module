<template>
    <div>
        <portal to="title">BigCommerce - Categories</portal>

        <div class="row">
            <div class="content-container">
                <p-datatable name="categories" sort-by="name" :endpoint="endpoint" :per-page="10">

                    <template slot="image_url" slot-scope="table">
                        <img :src="table.record.image_url" alt="Preview" class="w-50px" />
                    </template>

                    <template slot="description" slot-scope="table">
                        <span class="text-grey-darker text-sm">{{ table.record.description | truncate(250) }}</span>
                    </template>

                    <template slot="is_visible" slot-scope="table">
                        <span class="badge badge--success" v-if="table.record.is_visible === 1">Visible</span>
                        <span class="badge badge--danger" v-else>Hidden</span>
                    </template>

                    <template slot="actions" slot-scope="table">
                        <p-button @click="pushRoute('bigcommerce.categories.view', { id: table.record.id })">View</p-button>
                    </template>

                </p-datatable>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                endpoint: '/datatable/bigcommerce/categories',
            }
        },
        
        filters: {
            truncate: function(value, length) {
                return _.truncate(value, { 'length': length });
            }
        },

        methods: {
            pushRoute: function(name, params = {}) {
                Fusion.router.push({ name, params })
            }
        }
    }
</script>