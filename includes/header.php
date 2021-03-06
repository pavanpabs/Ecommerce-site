<?php
$configs = include('config.php');
// if (empty($_SESSION['username'])) {
//   $_SESSION['username'] = uniqid('User');
// }
if (isset($_SESSION['userID'])) {
  $userId = $_SESSION['userID'];
}else{
  $userId=0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Checkout</title>

</head>

<body>
  <script>
    $(document).ready(function() {
      var userId = '<?= $userId ?>';
      $('#cartCount').load("ajax/cartCount.php", {
        user: userId
      });


    });
  </script>

  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item active submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="category.php">Shop Category</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-product.php">Product Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="checkout.php">Product Checkout</a></li>
                  <li class="nav-item"><a class="nav-link" href="confirmation.php">Confirmation</a></li>
                  <li class="nav-item"><a class="nav-link" href="cart.php">Shopping Cart</a></li>
                </ul>
              </li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
                </ul>
              </li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
                  <li class="nav-item"><a class="nav-link" href="tracking-order.html">Tracking</a></li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>

            <ul class="nav-shop">
              <li class="nav-item">
                <form class="form-inline active-cyan-4" action="category.php" method="POST">
                  <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search" name="searchBox"/>
                 <button type="submit"> <i class="fas fa-search" aria-hidden="true"></i></button>
                </form>
              </li>
              <li class="nav-item"><a href="cart.php"><button><i class="fas fa-shopping-cart"></i><span id="cartCount" class="nav-shop__circle"></span></button></a> </li>

              <?php
              if (isset($_SESSION['userID'])) {

                $username = $_SESSION['username'];
                $role=$_SESSION['role'];
               
              ?>
                <li class="nav-item submenu dropdown">
                  <div class=" login-stat e d-flex align-items-center">
                    <div class="userthumb mr-30">
                      <i class="ti-user" aria-hidden="true"></i>
                    </div>
                    <div class="nav-itemsubmenu dropdown  ml-4">
                      <div class="dropdown">
                        <a class="dropdown-toggle dropdown" href="" role="button" id="userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $username ?> </a>
                        <div class="dropdown-menu dropdown-menu-right"aria-labelledby="userName">
                        <?php if($role=="Admin") { ?>
                          <a class="dropdown-item" href="<?= $configs['host'] ?>/dashboard.php">Dashboard </a>
                        <?php } ?>
                          <a class="dropdown-item" href="<?= $configs['host'] ?>/my-orders.php">My Orders</a>
                          <a class="dropdown-item" href="<?= $configs['host'] ?>/profile.php">Profile</a>
                          <a class="dropdown-item" href="<?= $configs['host'] ?>/logout.php">Logout</a>
                        </div>
                      </div>
                    </div>


                  </div>
                </li>
                
              <?php  } else { ?>

                <li class="nav-item"><a class="button button-header" href="login.php">Login/Register</a></li>

              <?php  } ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <!--================ End Header Menu Area =================-->