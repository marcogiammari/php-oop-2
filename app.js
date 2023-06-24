const { createApp } = Vue;

createApp({
    data() {
        return {
            api: 'db.php',
            database: null,
            cart: null
        }
    },
    mounted() {
        this.getData(this.api);
    },
    methods: {
        // getData
        getData(url) {
            axios.get(url)
            .then(response => {
                this.database = response.data;
            }).catch(error => {
                console.log('Errore nel recuperare i dati: ', error);
            })
        },
        // sendData
        sendData(data) {
            axios.post('cart.php', data, {
                headers: { 'Content-Type': 'multipart/form-data'}
            })
            .then((result) => {
                this.cart = result.data;
                console.log(this.cart);
            }).catch((error) => {
                console.log("Errore nell'invio dei dati: " + error);
            });
        },

        // Cart Actions
        addToCart(item) {
            data = {newItem: item};
            this.sendData(data);
        },        
        deleteItem(item) {
            data = {deleteItem: item};
            this.sendData(data);
        },
        resetCart() {
            data = {'reset': 'reset'}
            this.sendData(data);
        }
    }
}).mount("#app");