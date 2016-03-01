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
cart
</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/main.css">
</head>

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
<div class="jumbotron">
<div class="container">
<form method="post" action="" enctype="multipart/form-data">
<table class="table table-hover table-striped table-responsive">
<thead>
<tr>
<th>Remove</th>
<th>Title</th>
<th>Produt(s)</th>
<th>Quantity</th>
<th>Price</th>
</tr>
</thead>
<?php 
	$total=0;
	global $con;
	$ip=getIp();
	$run=mysqli_query($con,"select * from cart where ip_add='$ip'");
	while($row=mysqli_fetch_array($run))
	{
		$pro_id=$row['p_id'];
		$run1=mysqli_query($con,"select * from products where product_id='$pro_id'");
		while($row1=mysqli_fetch_array($run1))
		{
			$product_price=array($row1['product_price']);
			$product_image=$row1['product_image'];
			$product_title=$row1['product_title'];
			$single_price=$row1['product_price'];
			$value=array_sum($product_price);
			$total +=$value;
		
?>

<tbody>
<tr>
<td><div class="input-group">
      
        <input type="checkbox" aria-label="..." name="remove[]" value="<?php echo $pro_id;?>">
     </div></td>
	  <td><?php echo $product_title;?></td>
<td><div class="row">

  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <img src='product_images/<?php echo $product_image;?>' width="80" height="80" alt="database error please cool..."  />
    </a>
  </div>
  
</div> </td>

<td>
<input type="text" size="3" name="qty" />
</td>
<td><?php echo "$".$single_price;?></td>
</tr>
</tbody>
	<?php }} ?>
	<tr align="right">
	<td colspan="4">
	<b>Total :</b>
	</td><td><?php echo "$". $total; ?></td></tr>


<tr>
<div class="btn-group">
<td colspan="2">
  <button type="button"  class="btn btn-primary" aria-haspopup="true" aria-expanded="false" name="update">
    Update
  </button>
  </td>
  <td colspan="2">
  <button type="button"  class="btn btn-primary" aria-haspopup="true" aria-expanded="false" name="shoping">
    Continue shoping
  </button>
  </td>
  <td colspan="2">
  <button type="button"  class="btn btn-primary" aria-haspopup="true" aria-expanded="false" name="checkout">
    Check out
  </button>
  </td>
  </tr>
  </table>
</div>
</form>
<?php
$ip=getIp();
if(isset($_POST['update'])){
	foreach($_POST['remove'] as $remove_id)
	{
		$run=mysqli_query($con,"delete from cart where p_id='$remove_id' AND ip_add='$ip'");
	if($run)
	{
	echo"<script>window.open('cart.php','_self'</script>";
	}
	}
}
?>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>