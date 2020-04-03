<template>
    <p-table :endpoint="endpoint" id="product_custom_fields" sort-by="name" primary-key="id" key="product_custom_fields_table">

    </p-table>
</template>

<script>
    export default {
        name: 'bigcommerce-custom-fields',
        mixins: [ require('../../mixins/datatables').default ],
    }
</script>