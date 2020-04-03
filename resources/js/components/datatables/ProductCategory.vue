<template>
    <p-table :endpoint="endpoint" id="categories" sort-by="name" primary-key="id" key="categories_table">
        <template slot="name" slot-scope="table">
            <p-status :value="table.record.is_visible" class="mr-2"></p-status>

            <router-link :to="{ name: 'bigcommerce.categories.view', params: {id: table.record.id} }">{{ table.record.name }}</router-link>
        </template>

        <template slot="actions" slot-scope="table">
            <p-actions :id="'category_' + table.record.id + '_actions'" :key="'category_' + table.record.id + '_actions'">
                <p-dropdown-link :to="{ name: 'bigcommerce.categories.view', params: {id: table.record.id} }">View</p-dropdown-link>
            </p-actions>
        </template>

    </p-table>
</template>

<script>
    export default {
        name: 'bigcommerce-categories',
        mixins: [ require('../../mixins/datatables').default ]
    }
</script>