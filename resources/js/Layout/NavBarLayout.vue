<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <Link class="nav-link" href="#">Home <span class="sr-only">(current)</span></Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" href="/products">Products</Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" href="/products/create">Product Create</Link>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-3">
        <slot></slot>
    </div>
    <footer class="bg-dark text-white text-center py-3 sticky-bottom">
        <p>&copy; 2025 Your Company</p>
        <p>All rights reserved.</p>
        <p>Follow us on <a href="#" class="text-white">Twitter</a>, <a href="#" class="text-white">Facebook</a>, <a href="#" class="text-white">Instagram</a></p>
    </footer>
</template>

<style scoped>

</style>
