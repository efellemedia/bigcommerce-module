<template>
    <form-container>
        <portal to="actions">
            <div class="buttons">
                <router-link :to="{ name: 'bigcommerce.categories' }" class="button">Go Back</router-link>
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

                <p-textarea
                    label="Description"
                    name="description"
                    :readonly="true"
                    v-model="data.description">
                </p-textarea>

                <div v-if="data.parent" class="toolbar">
                    <div class="toolbar__group toolbar__group--grow">
                        <p-input
                            class="w-full"
                            label="Parent"
                            name="parent"
                            :readonly="true"
                            :value="data.parent.name">
                        </p-input>
                    </div>

                    <div class="toolbar__group">
                        <router-link class="button mr-3" :to="{ name: 'bigcommerce.categories.view', params: { id: data.parent.id }}">
                            Go to Parent
                        </router-link>
                    </div>
                </div>

                <p-tabs>
                    <p-tab key="products" name="Products">
                        <p-table :endpoint="endpoint" id="products" sort-by="name" primary-key="id" key="products_table">

                            <template slot="name" slot-scope="table">
                                <p-status :value="table.record.is_visible" class="mr-2"></p-status>

                                <router-link :to="{ name: 'bigcommerce.products.view', params: {id: table.record.id} }">{{ table.record.name }}</router-link>
                            </template>

                            <template slot="slug" slot-scope="table">
                                <code>{{ table.record.slug }}</code>
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
                    </p-tab>
                </p-tabs>
            </div>
        </div>

        <template v-slot:sidebar>
            <div v-if="data.image_url" class="card">
                <div class="card__body">
                    <p-img
                        class="mx-auto"
                        background-color="white"
                        :src="data.image_url"
                        :alt="data.name">
                    </p-img>
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
    export default {
        head: {
            title() {
                return {
                    inner: this.data.name || 'Loading...'
                }
            }
        },

        data() {
            return {
                data: {},
                endpoint: `/datatable/bigcommerce/categories/${this.id}/products`
            }
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
                        vm.$router.push('/bigcommerce/categories')

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
                    this.$router.push('/bigcommerce/categories')

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
        axios.get(`/api/bigcommerce/categories/${id}`).then((response) => {
            callback(null, response.data.data)
        }).catch(function(error) {
            callback(new Error('The requested entry could not be found'))
        })
    }
</script>