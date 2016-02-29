<!DOCTYPE HTML>
	<?php include 'function.php'; ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>
insert_products
</title>
<link rel="stylesheet" href="css/main.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  </head>
<body class="container-fluid">
<form method="post" action="insert.php"  enctype="multipart/form-data" class=" navbar navbar-form">
<div class="form-group">
<table align="center" width="750px" border="2" bgcolor="orange" class="table table-bordered table-striped table-responsive">
<tr>
<td align="center"><h2>INSERT PRODUCTS</h2>
</tr>
<tr>
<td align="right"><b>product title </b> :</td>
<td><input type="text" name="product_title" class="btn btn-default" required /></td>
</tr>
<tr>
<td align="right"><b>product  categorie </b> :</td>
<td>
<select name="product_cat">
<option>select categorie</option>
<option><?php getcat1(); ?></option>
</select></td>
</tr>
<tr>
<td align="right"><b>product price </b> :</td>
<td><input type="text" name="product_price" required /></td>
</tr>
<tr>
<td align="right"><b>product image </b> :</td>
<td><input type="file" class="btn btn-primary" name="product_image" required /></td>
</tr>
<tr>
<td align="right"><b>product keywords </b> :</td>
<td><input type="text" name="product_keyword" class="btn btn-default" size="50" required /></td>
</tr> 
<tr>
<td align="right"><b>product brand </b> :</td>
<td><select name="product_brand">
<option>select brand</option>
<option><?php getbrand1(); ?>
</option>
</select> </td>
</tr> 
<tr>
<td align="right"><b>product description </b> :</td>
<td><textarea cols="20" rows="10" name="product_desc"></textarea></td>
</tr> 
<tr>
<td align="center"> <input type="submit" class="btn btn-primary btn-lg btn-block" value="INSERT PRODUCT" name="insert_post"></td>
 </tr>
</table>
</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	if(isset($_POST['insert_post']))
	{
		$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
		$product_desc=$_POST['product_desc'];
		$product_price=$_POST['product_price'];
		$product_brand=$_POST['product_brand'];
		$product_keyword=$_POST['product_keyword'];
		$product_image=$_FILES['product_image']['name'];
		$product_image_tmp=$_FILES['product_image']['tmp_name'];
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		$insert_product=mysqli_query($con,"INSERT INTO products (product_price,product_des,product_brand,product_title,product_cat,product_keyword,product_image)
		VALUES ('$product_price','$product_desc','$product_brand','$product_title','$product_cat','$product_keyword','$product_image')");
	var_dump($insert_product);
if($insert_product){
		echo"<script>alert('your product insert into database')</script>";
	     echo"<script>window.open('insert.php','_self')</script>";
	}
	}

	
	?>