<script setup>
import { useForm } from '@inertiajs/vue3'
import { createToaster } from "@meforma/vue-toaster";
import NavBarLayout from '@/Layout/NavBarLayout.vue';

const toaster = createToaster({ /* options */ });

const props = defineProps({
    product: {
        type: Object,
        required: true
    }
})

const form = useForm({
    name: props.product.name,
    sku: props.product.sku,
    unit: props.product.unit,
    unit_value: props.product.unit_value,
    selling_price: props.product.selling_price,
    purchase_price: props.product.purchase_price,
    discount: props.product.discount,
    tax: props.product.tax,
    image: null,
})

function productUpdate() {
    form.put('/products/' + props.product.id, {
        errorBag: 'updateProduct',
        preserveScroll: true,
        forceFormData: true, // 👈 Needed for file upload!
        onSuccess: () => {
            form.clearErrors();
            form.reset();
            toaster.success('Product updated successfully!');
        },
        onError: () => {
            toaster.error('Failed to update product!');
        }
    });
}

form.clearErrors();

</script>

<template>
    <NavBarLayout>
        <div class="container mt-5 mb-5">
            <h1>Product Edit</h1>
            <form @submit.prevent="productUpdate" method="post">
                <!-- Product Details -->
                <div class="form-group">
                    <label for="productName">Product Name:</label>
                    <input type="text" class="form-control" id="productName" v-model="form.name" required>
                </div>
                <div class="text-danger" v-if="form.errors.name">{{ form.errors.name }}</div>

                <div class="form-group">
                    <label for="sku">Product SKU:</label>
                    <input type="text" class="form-control" id="sku" v-model="form.sku" required>
                </div>
                <div class="text-danger" v-if="form.errors.sku">{{ form.errors.sku }}</div>

                <div class="form-group">
                    <label for="unit">Unit:</label>
                    <input type="text" class="form-control" id="unit" v-model="form.unit" required>
                </div>
                <div class="text-danger" v-if="form.errors.unit">{{ form.errors.unit }}</div>

                <div class="form-group">
                    <label for="unitValue">Unit Value:</label>
                    <input type="text" class="form-control" id="unitValue" v-model="form.unit_value" required>
                </div>
                <div class="text-danger" v-if="form.errors.unit_value">{{ form.errors.unit_value }}</div>

                <div class="form-group">
                    <label for="sellingPrice">Selling Price:</label>
                    <input type="text" class="form-control" id="sellingPrice" v-model="form.selling_price" required>
                </div>
                <div class="text-danger" v-if="form.errors.selling_price">{{ form.errors.selling_price }}</div>

                <div class="form-group">
                    <label for="purchasePrice">Purchase Price:</label>
                    <input type="text" class="form-control" id="purchasePrice" v-model="form.purchase_price" required>
                </div>
                <div class="text-danger" v-if="form.errors.purchase_price">{{ form.errors.purchase_price }}</div>

                <div class="form-group">
                    <label for="discount">Discount:</label>
                    <input type="text" class="form-control" id="discount" v-model="form.discount" required>
                </div>
                <div class="text-danger" v-if="form.errors.discount">{{ form.errors.discount }}</div>

                <div class="form-group">
                    <label for="tax">Tax:</label>
                    <input type="text" class="form-control" id="tax" v-model="form.tax" required>
                </div>
                <div class="text-danger" v-if="form.errors.tax">{{ form.errors.tax }}</div>

                <!-- Previously uploaded image -->
                <div class="">
                    <label for="productImage">Current Product Image:</label>
                    <img :src="props.product.image" alt="Product Image" id="productImage" class="img-fluid" style="width: 50px; height: 50px;">
                </div>

                <!-- File Upload -->
                <div class="form-group">
                    <label for="productImage">Product Image:</label>
                    <input type="file" class="form-control" id="productImage" @input="form.image = $event.target.files[0]">
                </div>
                <div class="text-danger" v-if="form.errors.image">{{ form.errors.image }}</div>

                <button type="submit" class="btn btn-primary mt-3" :disabled="form.processing">Update</button>
            </form>
        </div>
    </NavBarLayout>

</template>

<style scoped>

</style>
