<script setup>
defineProps({
    product: {
        type: Object,
        required: true
    },
})
</script>

<template>
    <div class="product-component">
        <h1>Product edit Component</h1>
        <p>This is a simple product edit component.</p>
        {{ product.name }}
        <p>Product ID: {{ product.id }}</p>
    </div>

</template>

<style scoped>

</style>
