<!DOCTYPE html>
<?php
include("function.php");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- title -->
<title>
general store.com
</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/main.css">
</head>
                               <!-- body start -->
<body>
<nav class="navbar nav-pills " role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="main.php"><img src="product_images/Drawing.png." width="60px" height="40px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="main.php">HOME<span class="sr-only">(current)</span></a></li>
        <li><a href="about.php">ABOUT US</a></li>
		<li><a href="contact.php">CONTACT</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">LOGIN</a></li>
            <li><a href="#">SIGN UP</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search" onsubmit="myfunction()" method="get">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id="cart" class="container-fluid">

<span style="float:right; font-size:18px; padding:5px; line-height:40px;">

Welcome Guest! <b style="color:orange">Shopping cart</b> Total-item : <?php calculate(); ?>  Total-price : <?php totalprice(); ?> <a href="cart.php">Go To Cart</a>
</span>
</div>
                                                             <!--               container                     -->

<div class="jumbotron">
<div class="container">
<div class="container" style="width:200px; float:right;">
<div style="text-align:center;"><h4>CATEGORIES</h4>
                                                  <!--                 side bar  select categories from database -->
 <?phpvar_dump(cart.php);?>
<?php getcat(); ?>
</div>
<div style="text-align:center;"><h4>BRANDS</h4>
                                         <!--                 side bar  select brand from database -->                                         
<?php getbrand(); ?>

</div>
</div>
                                    <!--            get  data  from database -->
								

<?php
 getpro(); 
 
 getbrandpro();
getcatpro();
?>

</div>
</div>
<div class="panel-footer" ><h4 style="text-align:center; padding-top:30px;">&copy 2016 by vikram singh shekhawat</h4></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>