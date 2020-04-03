<template>
    <p-table :endpoint="endpoint" id="related" sort-by="name" primary-key="id" key="related_table">
        <template slot="name" slot-scope="table">
            <p-status :value="table.record.is_visible" class="mr-2"></p-status>

            <router-link :to="{ name: 'bigcommerce.products.view', params: {id: table.record.id} }">{{ table.record.name }}</router-link>
        </template>

        <template slot="is_featured" slot-scope="table">
            <span class="badge badge--success" v-if="table.record.is_featured === 1">Featured</span>
            <span v-else></span>
        </template>

        <template slot="actions" slot-scope="table">
            <p-actions :id="'related_' + table.record.id + '_actions'" :key="'related_' + table.record.id + '_actions'">
                <p-dropdown-link :to="{ name: 'bigcommerce.products.view', params: {id: table.record.id} }">View</p-dropdown-link>
            </p-actions>
        </template>

    </p-table>
</template>

<script>
    export default {
        name: 'bigcommerce-related',
        mixins: [ require('../../mixins/datatables').default ]
    }
</script>