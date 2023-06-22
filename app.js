const { createApp } = Vue;

createApp({
    data() {
        return {
            api: 'db.php',
            database: null
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
            })
            .catch(error => {
                console.log('Errore nel recuperare i dati: ', error);
            })
        },
    }
}).mount("#app");