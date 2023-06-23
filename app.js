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
        this.getData()
    },
    methods: {
        // getData
        getData() {
            axios.get(this.api)
            .then(response => {
                console.log(response);
                this.database = response.data;
            }).catch(error => {
                console.log('Errore nel recuperare i dati: ', error);
            })
        },
        // sendData
        sendData(data) {
            data = {data: data};
            axios.post('cart.php', data, {
                headers: { 'Content-Type': 'multipart/form-data'}
            })
            .then((result) => {
                console.log(result.data);
            }).catch((error) => {
                console.log("Errore nell'invio dei dati: " + error);
            });
        },
        addToCart(i) {
            this.cart.push(this.database[i]);
            console.log(this.cart);
            this.sendData(this.cart[i])
        }
    }
}).mount("#app");