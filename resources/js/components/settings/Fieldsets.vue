<template>
	<div>
		<portal name="setting-actions" to="actions">
			<router-link :to="{ name: 'settings' }" class="button mr-3">Go Back</router-link>
			<button type="submit" @click.prevent="submit" class="button button--primary">Save</button>
		</portal>

		<div class="row">
			<div class="content-container">
				<form v-if="form" @submit.prevent="submit">
					<div v-for="(field, index) in form.__data">
						<p-select
							:name="index"
							:label="index"
							help="Select a fieldset for this structure."
							:options="fieldsets"
							v-model="form[index].fieldset">
						</p-select>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>

<script>
	import Form from '../../../../../../resources/js/forms/Form'

	export default {
		name: 'bigcommerce-settings-fieldsets',

		data() {
			return {
				fieldsets: [],
				form: null,
			}
		},

		props: {
			settings: {
				type: Array,
				required: true
			}
		},

		methods: {
            submit() {
                this.form.patch('/api/bigcommerce/settings/fieldsets').then((response) => {
                    toast('Settings have been updated.', 'success')
                }).catch((response) => {
                    toast(response.response.data.message, 'failed')
                })
            },
        },

        mounted() {
        	axios.all([
        		axios.get('/api/fieldsets'),
        	]).then(axios.spread((fieldsets) => {
				const setting = _.find(this.settings, ['handle', 'bigcommerce_fieldsets'])
        		let   values  = _.isEmpty(setting.value) ? {} : JSON.parse(setting.value)

        		if (_.isEmpty(values)) {
        			values = {
        				catgories: {
        					namespace: 'Modules\\Bigcommerce\\Models\\Category',
        					fieldset: null
        				},
        				products: {
        					namespace: 'Modules\\Bigcommerce\\Models\\Product',
        					fieldset: null
        				},
        			}
        		}

        		this.form      = new Form(values)
        		this.fieldsets = _.map(fieldsets.data.data, fs => {
        			return { label: fs.name, value: fs.id }
        		})
        	}))
        }
	}
</script>