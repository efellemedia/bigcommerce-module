<template>
	<p-table :endpoint="endpoint" id="images" sort-by="description" primary-key="id" key="images_table">
		
		<template slot="url_standard" slot-scope="table">
			<img class="h-24" :src="table.record.url_standard" :alt="table.record.description"/>
		</template>

		<template slot="description" slot-scope="table">
			<span class="text-gray-800 text-sm" v-html="table.record.description"></span>
		</template>

		<template slot="is_thumbnail" slot-scope="table">
            <span class="badge badge--success" v-if="table.record.is_thumbnail">Thumbnail</span>
            <span v-else></span>
        </template>

	</p-table>
</template>

<script>
	export default {
		name: 'bigcommerce-images',
		mixins: [ require('../../mixins/datatables').default ]
	}
</script>