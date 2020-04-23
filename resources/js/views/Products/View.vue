<template>
    <form-container>
        <portal to="actions">
            <div class="buttons">
                <router-link :to="{ name: 'bigcommerce.products' }" class="button">Go Back</router-link>
            </div>
        </portal>

        <portal to="title">
            <app-title icon="paper-plane">BigCommerce - {{ data.name }}</app-title>
        </portal>

        <div class="card">
            <div class="card__body">
                <p-title
                    name="name"
                    :readonly="true"
                    v-model="data.name">
                </p-title>

                <p-input
                    name="sku"
                    label="SKU"
                    monospaced
                    v-model="data.sku">
                </p-input>

                <p-tabs>
                    <p-tab key="images" name="Images & Videos">
                        <product-images :endpoint="endpoint.images"></product-images>
                    </p-tab>

                    <p-tab key="related" name="Related">
                        <product-related :endpoint="endpoint.related"></product-related>
                    </p-tab>

                    <p-tab key="custom-fields" name="Custom Fields">
                        <product-custom-fields :endpoint="endpoint.customfields"></product-custom-fields>
                    </p-tab>

                    <p-tab key="reviews" name="Reviews">
                        <product-reviews :endpoint="endpoint.reviews"></product-reviews>
                    </p-tab>
                </p-tabs>
            </div>
        </div>

        <template v-slot:sidebar>
            <div class="card">
                <div class="card__body">
                    <p-tabs>
                        <p-tab key="pricing" name="Pricing">
                            <p-input label="Price" :readonly="true" :value="data.price"></p-input>
                            <p-input label="Cost Price" :readonly="true" :value="data.cost_price"></p-input>
                            <p-input label="Retail Price" :readonly="true" :value="data.retail_price"></p-input>
                            <p-input label="Sale Price" :readonly="true" :value="data.sale_price"></p-input>
                            <p-input label="Calculated Price" :readonly="true" :value="data.calculated_price"></p-input>
                        </p-tab>
                        <p-tab key="shipping" name="Shipping">
                            <p-input label="Weight" :readonly="true" :value="data.weight"></p-input>
                            <p-input label="Width" :readonly="true" :value="data.width"></p-input>
                            <p-input label="Length" :readonly="true" :value="data.length"></p-input>
                            <p-input label="Height" :readonly="true" :value="data.height"></p-input>
                        </p-tab>

                        <p-tab key="inventory" name="Inventory">
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
                </div>
            </div>

            <p-definition-list v-if="data">
                <p-definition name="Status">
                    <fa-icon :icon="['fas', 'circle']" class="fa-fw text-xs" :class="{'text-success-500': data.is_visible, 'text-danger-500': ! data.is_visible}"></fa-icon> {{ data.is_visible ? 'Visible' : 'Hidden' }}
                </p-definition>

                <p-definition name="Created At">
                    {{ $moment(data.created_at).format('Y-MM-DD, hh:mm a') }}
                </p-definition>

                <p-definition name="Updated At">
                    {{ $moment(data.updated_at).format('Y-MM-DD, hh:mm a') }}
                </p-definition>
            </p-definition-list>
        </template>
    </form-container>
</template>

<script>
    // import _ from 'lodash'

    export default {
        data() {
            return {
                data: {},
                endpoint: {
                    reviews:      `/datatable/bigcommerce/products/${this.id}/reviews`,
                    related:      `/datatable/bigcommerce/products/${this.id}/related`,
                    images:       `/datatable/bigcommerce/products/${this.id}/images`,
                    customfields: `/datatable/bigcommerce/products/${this.id}/customfields`,
                }
            }
        },

        components: {
            'product-images':        require('../../components/datatables/ProductImage.vue').default,
            'product-related':       require('../../components/datatables/ProductRelated.vue').default,
            'product-reviews':       require('../../components/datatables/ProductReview.vue').default,
            'product-custom-fields': require('../../components/datatables/ProductCustomFields.vue').default,
        },

        props: {
            id: {
                type: Number,
                required: true
            }
        },
        
        beforeRouteEnter(to, from, next) {
            getRecord(to.params.id, (error, data) => {
                if (error) {
                    next((vm) => {
                        vm.$router.push('/bigcommerce/products')

                        toast(error.toString(), 'danger')
                    })
                } else {
                    next((vm) => {
                        vm.data = data

                        vm.$emit('updateHead')
                    })
                }
            })
        },

        beforeRouteUpdate(to, from, next) {
            getRecord(to.params.id, (error, data) => {
                if (error) {
                    this.$router.push('/bigcommerce/products')

                    toast(error.toString(), 'danger')
                } else {
                    this.data = data

                    this.$emit('updateHead')
                }
            })

            next()
        }
    }

    export function getRecord(id, callback) {
        axios.get(`/api/bigcommerce/products/${id}`).then((response) => {
            callback(null, response.data.data)
        }).catch(function(error) {
            callback(new Error('The requested entry could not be found'))
        })
    }
</script>