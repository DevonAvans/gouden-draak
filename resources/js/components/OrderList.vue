<template>
    <section class="vue-item">
        <p class="dish-menu-text">{{menutext}}</p>
        <p>{{name}}</p>
        <p>&euro;{{price}}</p>
        <p>{{amount}}</p>
        <button type="submit">Delete</button>
    </section>
</template>

<script>
    export default {
        props: {
            menutext: String,
            name: String,
            price: String,
            amount: String,
        },
    }
</script>
