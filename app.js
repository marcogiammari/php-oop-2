const { createApp } = Vue;

createApp({
    data() {
        return {
            api: 'db.php',
            database: null,
            cart: []
        }
    },
    mounted() {
        console.log('App mounted!');
        this.getData(this.api);
        this.getCart();
    },
    methods: {
        // getData
        getData(url) {
            axios.get(url)
            .then(response => {
                console.log(response.data);
                this.database = response.data;
            }).catch(error => {
                console.log('Errore nel recuperare i dati: ', error);
            })
        },
        getCart() {
            axios.get('cart.php')
            .then(result => {
                console.log(result);
                this.cart = result.data;
            }).catch(error => {
                console.log('Errore nel recuperare i dati: ', error);
            })
        },
        sendData(data) {
            axios.post('cart.php', data, {
                headers: { 'Content-Type': 'multipart/form-data'}
            })
            .then((result) => {
                this.cart = result.data;
                console.log(result.data);
                console.log(this.cart);
            }).catch((error) => {
                console.log("Errore nell'invio dei dati: " + error);
            });
        },
        addToCart(item) {
            console.log("Prodotto da aggiungere: " + item);
            console.log(this.cart);
            data = {newItem: item};
            this.sendData(data);
        },        
        deleteItem(item) {
            console.log("Prodotto da aggiungere: " + item);
            console.log(this.cart);
            data = {deleteItem: item};
            this.sendData(data);
        },
        resetCart() {
            data = {'reset': 'reset'}
            this.sendData(data);
        }
    }
}).mount("#app");