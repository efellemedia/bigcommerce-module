<template>
    <form-container>
        <portal to="actions">
            <div class="buttons">
                <router-link :to="{ name: 'bigcommerce.categories' }" class="button">Go Back</router-link>
                <button type="submit" @click.prevent="submit" class="button button--primary" :class="{'button--disabled': !form.hasChanges}" :disabled="!form.hasChanges">Save</button>
            </div>
        </portal>

        <portal to="title">
            <app-title icon="paper-plane">BigCommerce - {{ category.name }}</app-title>
        </portal>

        <div class="card">
            <div class="card__body">
                <p-title
                    name="name"
                    :readonly="true"
                    v-model="category.name">
                </p-title>

                <redactor
                    label="Description"
                    name="description"
                    :readonly="true"
                    v-model="category.description">
                </redactor>

                <div v-if="category.parent" class="toolbar">
                    <div class="toolbar__group toolbar__group--grow">
                        <p-input
                            class="w-full"
                            label="Parent"
                            name="parent"
                            :readonly="true"
                            :value="category.parent.name">
                        </p-input>
                    </div>

                    <div class="toolbar__group">
                        <router-link class="button mr-3" :to="{ name: 'bigcommerce.categories.view', params: { id: category.parent.id }}">
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

                    <p-tab v-for="section in bodySections" :name="section.name" :key="section.handle">
                        <div v-for="field in section.fields" :key="field.handle" class="form__group">
                            <component
                                :is="field.type.id + '-fieldtype'"
                                :field="field"
                                v-model="form[field.handle]">
                            </component>
                        </div>
                    </p-tab>

                </p-tabs>
            </div>
        </div>

        <template v-slot:sidebar>
            <div v-if="category.image_url" class="card">
                <div class="card__body">
                    <p-img
                        class="mx-auto"
                        background-color="white"
                        :src="category.image_url"
                        :alt="category.name">
                    </p-img>
                </div>
            </div>

            <div class="card" v-for="section in sideSections" :key="section.handle">
                <div class="card__header">
                    <h3 class="card__title">{{ section.name }}</h3>
                    <p v-if="section.description" class="card__subtitle">{{ section.description }}</p>
                </div>

                <div class="card__body">
                    <component
                        :is="field.type.id + '-fieldtype'"
                        :field="field"
                        v-model="form[field.handle]"
                        v-for="field in section.fields"
                        :key="field.handle">
                    </component>
                </div>
            </div>

            <p-definition-list v-if="category">
                <p-definition name="Status">
                    <fa-icon :icon="['fas', 'circle']" class="fa-fw text-xs" :class="{'text-success-500': category.is_visible, 'text-danger-500': ! category.is_visible}"></fa-icon> {{ category.is_visible ? 'Visible' : 'Hidden' }}
                </p-definition>

                <p-definition name="Created At">
                    {{ $moment(category.created_at).format('Y-MM-DD, hh:mm a') }}
                </p-definition>

                <p-definition name="Updated At">
                    {{ $moment(category.updated_at).format('Y-MM-DD, hh:mm a') }}
                </p-definition>
            </p-definition-list>
        </template>
    </form-container>
</template>

<script>
    import Form from '../../../../../../resources/js/forms/Form'

    export default {
        head: {
            title() {
                return {
                    inner: this.category.name || 'Loading...'
                }
            }
        },

        data() {
            return {
                category: {},
                fields: {},
                form: new Form({}),
                endpoint: `/datatable/bigcommerce/categories/${this.id}/products`
            }
        },

        props: {
            id: {
                type: Number,
                required: true
            }
        },

        computed: {
            fieldset() { return this.category ? this.category.fieldset : null },
            sections() { return this.fieldset ? this.fieldset.sections : [] },
            bodySections() { return _.filter(this.sections, (section) => section.placement == 'body') },
            sideSections() { return _.filter(this.sections, (section) => section.placement == 'sidebar') },
        },

        methods: {
            submit() {
                this.form.patch(`/api/bigcommerce/categories/${this.id}`).then((response) => {
                    toast('Category saved successfully', 'success')
                }).catch((response) => {
                    toast(response.response.data.message, 'failed')
                })
            },
        },

        beforeRouteEnter(to, from, next) {
            getRecord(to.params.id, (error, category, fields) => {
                if (error) {
                    next((vm) => {
                        vm.$router.push('/bigcommerce/categories')

                        toast(error.toString(), 'danger')
                    })
                } else {
                    next((vm) => {
                        vm.category = category
                        vm.form     = new Form(fields, true)

                        vm.$emit('updateHead')
                        vm.form.resetChangeListener()
                    })
                }
            })
        },

        beforeRouteUpdate(to, from, next) {
            getRecord(to.params.id, (error, category, fields) => {
                if (error) {
                    this.$router.push('/bigcommerce/categories')

                    toast(error.toString(), 'danger')
                } else {
                    this.category = category
                    this.form     = new Form(fields, true)

                    this.$emit('updateHead')
                    this.form.resetChangeListener()
                }
            })

            next()
        }
    }

    export function getRecord(id, callback) {
        axios.get(`/api/bigcommerce/categories/${id}`).then((response) => {
            let category = response.data.data
            let fields   = {}

            if (category.fieldset) {
                _.forEach(category.fieldset.sections, (section) => {
                    _.forEach(section.fields, (field) => {
                        fields[field.handle] = category[field.handle] || field.default
                    })
                })
            }

            callback(null, category, fields)
        }).catch(function(error) {
            callback(new Error('The requested entry could not be found'))
        })
    }
</script>