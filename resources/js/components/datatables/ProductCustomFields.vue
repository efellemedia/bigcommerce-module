<template>
    <p-table :endpoint="endpoint" id="product_custom_fields" sort-by="name" primary-key="id" key="product_custom_fields_table">

    	<template slot="value" slot-scope="table">
            <span class="text-gray-800 text-sm" v-html="table.record.value"></span>
        </template>

    </p-table>
</template>

<script>
    export default {
        name: 'bigcommerce-custom-fields',
        mixins: [ require('../../mixins/datatables').default ],
    }
</script>