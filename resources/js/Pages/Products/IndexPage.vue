<script setup>
import NavBarLayout from '@/Layout/NavBarLayout.vue';
// import type { Header, Item } from 'vue3-easy-data-table';
import { Link } from '@inertiajs/vue3';

defineProps({
    products: {
        type: Array,
        default: () => []
    }
})

// const headers: Header[] = [
//   { text: "ID", value: "player" },
//   { text: "Name", value: "team"},
//   { text: "SKU", value: "number"},
//   { text: "Unit", value: "position"},
//   { text: "Unit Value", value: "indicator.height"},
//   { text: "Selling Price", value: "indicator.weight", sortable: true},
//   { text: "Image", value: "lastAttended", width: 200},
//   { text: "Action", value: "country"},
// ];

// const items: Item[] = [
//   { player: "Stephen Curry", team: "GSW", number: 30, position: 'G', indicator: {"height": '6-2', "weight": 185}, lastAttended: "Davidson", country: "USA"},
//   { player: "Lebron James", team: "LAL", number: 6, position: 'F', indicator: {"height": '6-9', "weight": 250}, lastAttended: "St. Vincent-St. Mary HS (OH)", country: "USA"},
//   { player: "Kevin Durant", team: "BKN", number: 7, position: 'F', indicator: {"height": '6-10', "weight": 240}, lastAttended: "Texas-Austin", country: "USA"},
//   { player: "Giannis Antetokounmpo", team: "MIL", number: 34, position: 'F', indicator: {"height": '6-11', "weight": 242}, lastAttended: "Filathlitikos", country: "Greece"},
// ];

</script>

<template>
    <NavBarLayout>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h2>Product List</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Unit</th>
                                <th>Unit Value</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in products" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ product.name }}</td>
                                <td>{{ product.sku }}</td>
                                <td>{{ product.unit }}</td>
                                <td>{{ product.unit_value }}</td>
                                <td>{{ product.selling_price }}</td>
                                <td>
                                    <img :src="product.image" alt="Product Image" class="img-fluid" style="width: 50px; height: 50px;">
                                </td>
                                <td>
                                    <Link class="btn btn-primary me-2" :href="route('products.edit', product.id)">Edit</Link>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <EasyDataTable
                        :headers="headers"
                        :items="products"
                    /> -->

                </div>
                <div class="col-4">

                </div>
            </div>

            <!-- <div class="product-list">
                <ul>
                    <li v-for="product in products" :key="product.id">
                        {{ product.name }} - {{ product.selling_price }}
                    </li>
                </ul>
            </div> -->
        </div>
    </NavBarLayout>
</template>

<style scoped>

</style>
