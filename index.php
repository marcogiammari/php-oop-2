<?php 

require 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet's Shop</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

</head>
<body class="bg-dark text-light">
    <div id="app">        
        <header>
            <nav class="d-flex align-items-center px-4">
                <h1>Pet's Shop</h1>
            </nav>
        </header>
        <main class="d-flex flex-column gap-5 justify-content-center align-items-center">
            <div class="container">
                <h3>Products</h3>
                <div class="row flex-nowrap gap-3 overflow-auto rounded">
                    <?php foreach ($products as $product) { ?>
                        <div class="relative col-auto card p-0 d-flex flex-column justify-content-between align-items-center text-dark fw-semibold">
                            <div class="pb-3">
                                <div id="category" class="d-flex justify-content-between w-100">
                                    <p class="bg-warning rounded"><?= get_class($product) ?></p>
                                    <p class="bg-primary rounded"><?= $product->category->icon ?></p>
                                </div>
                                <img src="<?= $product->thumb ?>" alt="<?= $product->name ?>">
                            </div>
                            <div class="w-100 my-card-body d-flex flex-column gap-1 justify-content-between align-items-center p-3 bg-primary text-white">
                                <div class="d-flex gap-2">
                                    <p><?= $product->name ?></p>
                                    <p><?= $product->price . '&euro;'?></p>
                                    <p>
                                </div>    
                                    <?php 
                                        if (method_exists($product, 'getWeight')) {
                                            echo '<small>Weight: ' . $product->getWeight() . "</small>";
                                        } 
                                        if (method_exists($product, 'getSize')) {
                                            try {
                                                echo '<small>Size: ' . $product->getSize() . "</small>";
                                            } catch (Exception $e) {
                                                echo "<small>".$e->getMessage() . "</small>";
                                            }
                                        } 
                                        if (method_exists($product, 'getMaterial')) {
                                            echo "<small>Material: " . $product->getMaterial() . "</small>";
                                        } 
                                    ?>
                                </p>
                                <button @click="addToCart()" class="btn btn-light">Add to Cart</button>
                            </div>
                        </div>
                    <?php } ?>        
                </div>
            </div>        
        </main>
    </div>
    <script src="./app.js"></script>
</body>
</html>