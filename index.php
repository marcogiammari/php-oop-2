<?php 
session_start();
session_unset();
$_SESSION["id"] = session_create_id();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet's Shop</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</head>
<body class="bg-dark text-light">
    <div id="app"> 
        
        <!-- header -->
        <header>
            <nav class="d-flex justify-content-between align-items-center bg-primary px-4">
                <h1>Pet's Shop</h1>
                
                <div class="d-flex align-items-center gap-3">

                    <!-- signup -->
                    <button v-show="!signUpState && !loginState"  type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#signUpModal">
                        Sign Up
                    </button>

                    <!-- signup modal -->
                    <div class="modal fade text-primary mt-5" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div v-show="!signUpState" class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 m-2" id="signUpModalLabel">Sign Up</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body w-75">
                                    <input @keyup.enter="signUp()" v-model="signUpEmail" class="form-control m-2" type="text" placeholder="Your Email">
                                    <input @keyup.enter="signUp()" v-model="signUpPassword" type="password" class="form-control m-2" placeholder="Your Password">
                                    <p v-show="signUpState === false" class="m-2 pt-2">
                                        Your email has already been used. Try another one!
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button @click="signUp()" type="button" class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                            <div v-show="signUpState" class="modal-content p-5">
                                <h5>Thank you, your registration was successful!</h5>
                            </div>
                        </div>
                    </div>

                    <!-- login -->
                    <button v-show="!loginState" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                    
                    <!-- login modal -->
                    <div class="modal fade text-primary mt-5" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div v-show="!loginState" class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 m-2" id="loginModalLabel">Login</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body w-75">
                                    <input @keyup.enter="login()" v-model="loginEmail" class="form-control m-2" type="text" placeholder="Your Email">
                                    <input @keyup.enter="login()" v-model="loginPassword" type="password" class="form-control m-2" placeholder="Your Password">
                                    <p v-show="loginState === false" class="m-2 pt-2">
                                        Incorrect email or password
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button @click="login()" type="button" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                            <div v-show="loginState" class="modal-content p-5">
                                <h5>Welcome back!</h5>
                            </div>
                        </div>
                    </div>

                    <!-- logout -->
                    <button v-show="loginState" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        Logout
                    </button>
                    
                    <!-- logout modal -->
                    <div class="modal fade text-primary mt-5" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div v-show="loginState" class="modal-content">
                                <div v-show="loginState" class="modal-content p-5">
                                    <h5 class="pt-3">Are you sure you want to logout?</h5>
                                    <button @click="logout()" type="button" class="btn btn-primary">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- cart -->
                    <button v-show="loginState" class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        Cart
                    </button>
                </div>
                
                <!-- offcanvas -->
                <div class="w-25 offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">My Cart</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-flex flex-column gap-2">
                        
                        <div class="card position-relative d-flex flex-column gap-2 align-items-center" v-for="product, i in cart">
                            <button @click="deleteItem(i)" class="position-absolute end-0 top-0">
                                X
                            </button>
                            <span>{{ product.name }}</span>
                            <img class="my-cart-img img-fluid" :src="product.thumb" alt="product.name">
                        </div>
                        <button @click="">Proceed to the payment</button>
                        <button @click="resetCart()" class="btn btn-light">
                                Reset Cart
                        </button>
                    </div>
                </div>
            </nav>
        </header>

        <!-- main -->
        <main class="d-flex justify-content-center align-items-center">
            <section class="d-flex flex-column gap-5 justify-content-center align-items-center">
                <div class="container d-flex flex-nowrap gap-3 overflow-auto rounded">

                    <!-- card -->
                    <div v-for="product, i in database" class="relative col-auto card p-0 d-flex flex-column justify-content-between align-items-center text-dark fw-semibold my-3">
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
                            <div class="d-flex flex-column gap-1 text-center">
                                <small v-show="product.weight">Weight: {{ product.weight }}</small>
                                <small v-show="product.size">Size: {{ product.size }}</small>
                                <small v-show="product.material">Material: {{ product.material }}</small>
                            </div>
                            <button v-if="loginState" @click="addToCart(product)" class="btn btn-light">
                                Add to Cart
                            </button>                            
                        </div>
                    </div>
                </div> 
            </section>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="./app.js"></script>
</body>
</html>