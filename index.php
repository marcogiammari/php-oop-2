<?php 

require 'db.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet's Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
</head>
<body class="bg-dark text-light">
    <header>
        <nav class="d-flex align-items-center px-4">
            <h1>Pet's Shop</h1>
        </nav>
    </header>
    <main class="d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row flex-nowrap gap-2 overflow-auto rounded">
                <?php foreach ($products as $product) { ?>
                    <div class="col-auto card d-flex flex-column justify-content-center align-items-center text-dark p-3 fw-semibold">
                        <div class="d-flex gap-2">
                            <p><?= get_class($product) ?></p>
                            <p><?= $product->category->icon ?></p>
                        </div>
                        <img src="<?= $product->thumb ?>" alt="">
                        <p><?= $product->name ?></p>
                        <p><?= $product->price . '&euro;'?></p>
                    </div>
                <?php } ?>        
            </div>
        </div>
    </main>

</body>
</html>