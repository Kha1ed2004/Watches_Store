<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watches</title>
</head>

<body>
<?php
if (isset($_SESSION['logout_msg'])) {
    echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; margin: 15px; border-radius: 5px; text-align:center;'>
        {$_SESSION['logout_msg']}
    </div>";
    unset($_SESSION['logout_msg']); 
}
?>

    <header class="bg-secondary sticky-top">
        <div class="container ps-2 ">
            <nav class="navbar navbar-expand-lg  text-center ">
                <div class="container-fluid">
                    <a class="navbar-brand fs-3 text-light" href="#">Watches</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 px-2">
                            <li class="nav-item px-2 fw-bold">
                               <?php if (isset($_SESSION['user'])): ?>
                                    <a class="nav-link text-light" href="#"> <?= $_SESSION['user']['name'] ?></a>
                                    <li class="nav-item px-2 fw-bold"></li>
                                    <a class="nav-link text-light" href="logout.php">Logout</a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item px-2 fw-bold"></li>
                                <a class="nav-link text-light" href="login.php">Login</a>
                                </li>
                                <?php endif; ?>
                            </li>
                            <li class="nav-item px-2 fw-bold">
                                <a class="nav-link text-light" href="register.php">Register</a>
                            </li>
                            <li class="nav-item px-2 fw-bold">
                                <a class="nav-link text-light" href="#Home">Home</a>
                            </li>
                            <li class="nav-item px-2 fw-bold">
                                <a class="nav-link text-light" href="about.html">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section id="Home" class="home section-padding d-flex align-items-center justify-content-between">
        <div class="container ">
            <div class="row ">
                <div class="col-lg-6 col-md-12 col-sm-12  d-flex align-items-center ">
                    <div class="info text-light ">
                        <h2>Welcome to Our Watches!</h2>
                        <h1 class="display-4 py-2">The best men's watches collection in Egypt</h1>
                        Discover our premium collection of men's watches designed for elegance and precision.<br>
                        From classic to modern styles, find the perfect watch that matches your personality.<br>
                        High-quality men's watches that combine durability, style, and sophistication.<br>
                        Stand out with our exclusive selection of men's watches from top global brands.<br>
                        Timeless designs crafted to elevate your everyday look.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="Menu" class="menu section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Our Watches</h1>
                    <p>We divide our watch collection into three main categories.</p>
                </div>
            </div>

            <div class="row py-3">
                <div class="col-12">
                    <h3 class="py-3">Casio Watches</h3>
                </div>
            </div>

            <div class="container py-4">
                <div class="row g-4">

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100">
                            <img src="images/casio dubi men/كاسيو دبي رجالي 2.jpg" class="card-img-top" alt="Classic Watch 1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Classic Leather Watch</h5>
                                <p class="card-text">Elegant men's watch with luxurious leather design.</p>
                                <form action="order.php" method="POST">
                                    <input type="hidden" name="watch_name" value="Classic Leather Watch">
                                    <input type="hidden" name="watch_img" value="images/casio dubi men/كاسيو دبي رجالي 2.jpg">
                                    <button type="submit" class="btn btn-dark mt-auto">Order Now</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100">
                            <img src="images/casio dubi women/كاسيو دبي حريمي 2.jpg" class="card-img-top" alt="Classic Watch 2">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Minimalist Gold Watch</h5>
                                <p class="card-text">Elegant women's watch with soft golden touch.</p>
                                <form action="order.php" method="POST">
                                    <input type="hidden" name="watch_name" value="Minimalist Gold Watch">
                                    <input type="hidden" name="watch_img" value="images/casio dubi women/كاسيو دبي حريمي 2.jpg">
                                    <button type="submit" class="btn btn-dark mt-auto">Order Now</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100">
                            <img src="images/casio men moon/الكاسيو القمريه 2.jpg" class="card-img-top" alt="Classic Watch 3">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Vintage Chronograph</h5>
                                <p class="card-text">Moon-inspired stylish and practical everyday watch.</p>
                                <form action="order.php" method="POST">
                                    <input type="hidden" name="watch_name" value="Vintage Chronograph">
                                    <input type="hidden" name="watch_img" value="images/casio men moon/الكاسيو القمريه 2.jpg">
                                    <button type="submit" class="btn btn-dark mt-auto">Order Now</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100">
                            <img src="images/casio men/كاسيو المعدن (اخضر).jpg" class="card-img-top" alt="Classic Watch 4">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Silver Dial Classic</h5>
                                <p class="card-text">Green metallic watch for the modern practical man.</p>
                                <form action="order.php" method="POST">
                                    <input type="hidden" name="watch_name" value="Silver Dial Classic">
                                    <input type="hidden" name="watch_img" value="images/casio men/كاسيو المعدن (اخضر).jpg">
                                    <button type="submit" class="btn btn-dark mt-auto">Order Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row py-3">
                <div class="col-12 ">
                    <h3 class="py-3">Silver Watches</h3>
                </div>
            </div>

            <div class="container py-4">
                <div class="row g-4">

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100">
                            <img src="images/karacter/كارتير جلد .jpg" class="card-img-top" alt="Cartier Leather">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Cartier Leather</h5>
                                <p class="card-text">Elegant leather watch with classic design for all occasions.</p>
                                <form action="order.php" method="POST">
                                    <input type="hidden" name="watch_name" value="Cartier Leather">
                                    <input type="hidden" name="watch_img" value="images/karacter/كارتير جلد .jpg">
                                    <button type="submit" class="btn btn-dark mt-auto">Order Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100">
                            <img src="images/fossil/FOSSIL2.jpg" class="card-img-top" alt="Fossil Watch">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Fossil Brown Steel</h5>
                                <p class="card-text">Luxurious Fossil watch with brown metallic design.</p>
                                <form action="order.php" method="POST">
                                    <input type="hidden" name="watch_name" value="Fossil Brown Steel">
                                    <input type="hidden" name="watch_img" value="images/fossil/FOSSIL.jpg">
                                    <button type="submit" class="btn btn-dark mt-auto">Order Now</button>
                                </form>
                            </div>
                        </div>
                    </div>

                  <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100">
                            <img src="images/hublot/HUBLOT رابر3.jpg" class="card-img-top" alt="Hublot">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Hublot Rubber</h5>
                                <p class="card-text">Luxury watch with rubber strap and sporty design.</p>
                                <form action="order.php" method="POST">
                                    <input type="hidden" name="watch_name" value=""Hublot>
                                    <input type="hidden" name="watch_img" value="images/hublot/HUBLOT رابر3.jpg">
                                    <button type="submit" class="btn btn-dark mt-auto">Order Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100">
                            <img src="images/omega/OMEGA اسمر.jpg" class="card-img-top" alt="Omega Black">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">OMEGA Black</h5>
                                <p class="card-text">Refined Swiss design for a luxurious look on every occasion.</p>
                                <form action="order.php" method="POST">
                                    <input type="hidden" name="watch_name" value="OMEGA Black">
                                    <input type="hidden" name="watch_img" value="images/omega/OMEGA اسمر.jpg">
                                    <button type="submit" class="btn btn-dark mt-auto">Order Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>
