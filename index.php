<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet's Shop</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body class="bg-dark text-light">
    <div id="app">        
        <header>
            <nav class="d-flex align-items-center px-4">
                <h1>Pet's Shop</h1>
            </nav>
        </header>
        <main class="d-flex flex-column gap-5 justify-content-center align-items-center">
            <div class="w-75 d-flex flex-nowrap gap-3 overflow-auto rounded">
                <div v-for="product, i in database" class="relative col-auto card p-0 d-flex flex-column justify-content-between align-items-center text-dark fw-semibold">
                    <div class="pb-3">
                        <div id="category" class="d-flex justify-content-between w-100">
                            <p class="bg-warning rounded p-2">{{ product.category.name }}</p>
                            <p class="bg-primary rounded p-2"><i class="text-white" :class="product.category.icon"></i></p>
                        </div>
                        <img :src="product.thumb" alt="product.name">
                    </div>
                    <div class="w-100 my-card-body d-flex flex-column gap-1 justify-content-between align-items-center p-3 bg-primary text-white">
                        <div class="d-flex gap-2">
                            <p>{{ product.name }}</p>
                            <p>{{ product.price }} &euro;</p>
                        </div>
                        <div>
                            <small v-show="product.weight">Weight: {{ product.weight }}</small>
                            <small v-show="product.size">Size: {{ product.size }}</small>
                            <small v-show="product.material">Material: {{ product.material }}</small>
                        </div>
                        <button class="btn btn-light">
                            Add to Cart
                        </button>
                </div>
            </div>        
        </main>
    </div>
    <script src="./app.js"></script>
</body>
</html>