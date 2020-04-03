<template>
    <p-table :endpoint="endpoint" id="product_reviews" sort-by="date_created" primary-key="id" key="product_reviews_table">
        <template slot="text" slot-scope="table">
            <span class="mr-2" :class="'text-'+ status(table.record.status) + '-500'">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="icon fa-xs svg-inline--fa fa-circle fa-w-16">
                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z" class=""></path>
                </svg>

                <span class="text-gray-800 text-sm" v-html="table.record.text"></span>
            </span>
        </template>

        <template slot="rating" slot-scope="table">
            <fa-icon v-if="table.record.rating >= 1" :icon="['fas', 'star']" class="fa-fw text-primary"></fa-icon>
            <fa-icon v-if="table.record.rating >= 2" :icon="['fas', 'star']" class="fa-fw text-primary"></fa-icon>
            <fa-icon v-if="table.record.rating >= 3" :icon="['fas', 'star']" class="fa-fw text-primary"></fa-icon>
            <fa-icon v-if="table.record.rating >= 4" :icon="['fas', 'star']" class="fa-fw text-primary"></fa-icon>
            <fa-icon v-if="table.record.rating >= 5" :icon="['fas', 'star']" class="fa-fw text-primary"></fa-icon>
        </template>

        <template slot="date_created" slot-scope="table">
            {{ $moment(table.record.date_created).fromNow() }}
        </template>
    </p-table>
</template>

<script>
    export default {
        name: 'bigcommerce-reviews',
        mixins: [ require('../../mixins/datatables').default ],

        methods: {
            status(value) {
                switch (value) {
                    case 'pending':     return 'warning'
                    case 'approved':    return 'success'
                    case 'disapproved': return 'danger'
                }
            }
        },
    }
</script>