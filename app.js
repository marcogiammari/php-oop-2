const { createApp } = Vue;

createApp({
    data() {
        return {
                    
        }
    },
    mounted() {
        console.log('App mounted!');
    },
    methods: {
        addToCart(product) {
            console.log(product);
        }
    }
}).mount("#app");