<template>
    <div>
        <portal to="title">BigCommerce Product</portal>

        <div class="row">
            <div class="content-container">
                <p-tabs>

                    <p-tab name="Details">
                        <p-input label="Name" :readonly="true" v-model="data.name" />
                        <p-input label="SKU" :readonly="true" v-model="data.sku" />
                        <p-textarea label="Description" :readonly="true" v-model="data.description" />
                    </p-tab>

                    <p-tab name="Images & Videos">
                        <div class="flex">
                            <div v-for="image in data.images" :key="image.id" class="flex-1 mr-3">
                                <img :src="image.url_standard" class="shadow rounded" />
                            </div>
                        </div>
                    </p-tab>

                    <p-tab name="Categories">
                        <div class="flex">
                            <div v-for="category in data.categories" :key="category.id" class="mr-3">
                                <router-link class="button" :to="{ name: 'bigcommerce.categories.view', params: { id: category.id }}">
                                    {{ category.name }}
                                </router-link>
                            </div>
                        </div>
                    </p-tab>

                    <p-tab name="Related">
                        <div class="flex">
                            <div v-for="related in data.related" :key="related.id" class="mr-3">
                                <router-link class="button" :to="{ name: 'bigcommerce.products.view', params: { id: related.id }}">
                                    {{ related.name }}
                                </router-link>
                            </div>
                        </div>
                    </p-tab>

                    <p-tab name="Custom Fields">
                        <div class="row">
                            <div v-for="customfield in data.customfields" :key="customfield.id" class="col w-full xl:w-1/2">
                                <p-input :label="customfield.name" :readonly="true" v-model="customfield.value" />
                            </div>
                        </div>
                    </p-tab>

                </p-tabs>
            </div>

            <div class="side-container">
                <p-tabs>

                    <p-tab name="Pricing">
                        <p-input label="Price" :readonly="true" :value="data.price"></p-input>
                        <p-input label="Cost Price" :readonly="true" :value="data.cost_price"></p-input>
                        <p-input label="Retail Price" :readonly="true" :value="data.retail_price"></p-input>
                        <p-input label="Sale Price" :readonly="true" :value="data.sale_price"></p-input>
                        <p-input label="Calculated Price" :readonly="true" :value="data.calculated_price"></p-input>
                    </p-tab>

                    <p-tab name="Shipping">
                        <p-input label="Weight" :readonly="true" :value="data.weight"></p-input>
                        <p-input label="Width" :readonly="true" :value="data.width"></p-input>
                        <p-input label="Length" :readonly="true" :value="data.length"></p-input>
                        <p-input label="Height" :readonly="true" :value="data.height"></p-input>
                    </p-tab>

                    <p-tab name="Inventory">
                        <p-input label="Current Level" :readonly="true" :value="data.inventory_level"></p-input>
                        <p-input label="Warning Level" :readonly="true" :value="data.inventory_warning_level"></p-input>

                        <div class="form__group">
                            <label class="form__label">Tracking</label>
                            <span class="badge badge--success" v-if="data.inventory_tracking === 'product'">Product</span>
                            <span class="badge badge--success" v-if="data.inventory_tracking === 'variant'">Variant</span>
                            <span class="badge badge--danger" v-if="data.inventory_tracking === 'none'">Not Tracking</span>
                        </div>
                    </p-tab>

                </p-tabs>

                <portal to="actions">
                    <router-link :to="{ name: 'bigcommerce.products' }" class="button mr-3">Go Back</router-link>
                </portal>
            </div>
        </div>

        <div class="row">
            <div class="content-container">
                <h2>Product Reviews</h2>

                <p-datatable name="reviews" sort-by="date_created" :noActions="true" :endpoint="reviews" :per-page="10">

                    <template slot="status" slot-scope="table">
                        <span class="badge badge--warning" v-if="table.record.status === 'pending'">Pending</span>
                        <span class="badge badge--success" v-if="table.record.status === 'approved'">Approved</span>
                        <span class="badge badge--danger" v-if="table.record.status === 'disapproved'">Rejected</span>
                    </template>

                    <template slot="rating" slot-scope="table">
                        <fa-icon v-if="table.record.rating >= 1" :icon="['fas', 'star']" class="fa-fw text-primary"></fa-icon>
                        <fa-icon v-if="table.record.rating >= 2" :icon="['fas', 'star']" class="fa-fw text-primary"></fa-icon>
                        <fa-icon v-if="table.record.rating >= 3" :icon="['fas', 'star']" class="fa-fw text-primary"></fa-icon>
                        <fa-icon v-if="table.record.rating >= 4" :icon="['fas', 'star']" class="fa-fw text-primary"></fa-icon>
                        <fa-icon v-if="table.record.rating >= 5" :icon="['fas', 'star']" class="fa-fw text-primary"></fa-icon>
                    </template>

                </p-datatable>
            </div>
        </div>
    </div>
</template>

<script>
    // import _ from 'lodash'

    export default {
        data() {
            return {
                data: {}
            }
        },

        props: {
            id: {
                type: Number,
                required: true
            }
        },

        computed: {
            query: function() {
                const includes = 'categories,related,options,modifiers'
                const excludes = ''
                return `include=${includes}&exclude=${excludes}`
            },
            reviews: function() {
                return `/datatable/bigcommerce/products/${this.id}/reviews`
            }
        },

        methods: {
            loadModel: function() {
                axios.get(`/api/bigcommerce/products/${this.id}?${this.query}`)
                .then(response => {
                    this.data = response.data.data
                })
                .catch((error) => {
                    console.log(error)
                });
            }
        },
        
        beforeRouteEnter(to, from, next) {
            next(function(vm) {
                vm.loadModel()
            });
        },

        beforeRouteUpdate(to, from, next) {
            this.loadModel()
        }
    }
</script>