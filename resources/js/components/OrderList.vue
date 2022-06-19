<template>
    <section class="vue-item">
        <p class="dish-menu-text">{{menutext}}</p>
        <p>{{name}}</p>
        <p>{{price}}</p>
        <p>{{amount}}</p>
        
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
