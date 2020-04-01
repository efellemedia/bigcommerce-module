<template>
    <div>
        <portal to="title">BigCommerce - {{ data.name }}</portal>

        <div class="row">
            <div class="content-container">
                <p-card>
                    <div class="row">
                        <div class="col w-full xl:w-2/3">
                            <p-input label="Name" :readonly="true" v-model="data.name" />

                            <p-textarea label="Description" :readonly="true" v-model="data.description" />

                            <p-img v-if="hasImage" :src="data.image_url"></p-img>
                        </div>
                    </div>
                </p-card>
            </div>

            <div class="side-container">
                <p-card>
                    <div class="row">
                        <div class="col w-full">
                            <p-input label="Visibility" :readonly="true" :value="visibility"></p-input>

                            <p-input v-if="hasParent" label="Parent" :readonly="true" :value="data.parent.name"></p-input>
                            <router-link class="button mr-3" v-if="hasParent" :to="{ name: 'bigcommerce.categories.view', params: { id: data.parent.id }}">
                                Go to Parent
                            </router-link>
                        </div>
                    </div>

                    <portal to="actions">
                        <router-link :to="{ name: 'bigcommerce.categories' }" class="button mr-3">Go Back</router-link>
                    </portal>
                </p-card>
            </div>
        </div>

        <div class="row">
            <div class="content-container">
                <h2>Products</h2>

                <p-datatable name="products" sort-by="name" :endpoint="products" :per-page="10">

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
            visibility() {
                return this.data.is_visible ? 'Visible' : 'Hidden'
            },
            
            hasParent() {
                return this.data.parent != null
            },

            hasImage() {
                return this.data.image_url != null
            },
            products: function() {
                return `/datatable/bigcommerce/categories/${this.id}/products`
            }
        },

        methods: {
            loadModel: function(id) {
                axios.get(`/api/bigcommerce/categories/${this.id}`)
                .then(response => {
                    this.data = response.data.data
                })
                .catch((error) => {
                    console.log(error)
                });
            },

            pushRoute: function(name, params = {}) {
                Fusion.router.push({ name, params })
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