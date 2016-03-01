<?php
include 'db.php';

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
 
function cart()
{
	
	if(isset($_GET['add_cart']))
	{
		
		global $con;
		$ip=getIp();
		$pro_id=$_GET['add_cart'];
		$run=mysqli_query($con,"select * from cart where ip_add='$ip' AND p_id='$pro_id'");
		if(mysqli_num_rows($run)>0)
		{
			
			echo"";
		}
		else
		{
		
			$insert="insert into cart (p_id,ip_add) VALUES('$pro_id','$ip')";
			$run=mysqli_query($con,$insert);
			echo"<script>alert('you add item to cart')</script>";
			echo"<script>window.open('main.php','_self')</script>";
		}
		
	}
}
function calculate()
{
	if(isset($_GET['add_cart']))
	{
		global $con;
		$ip=getIp();
		$run=mysqli_query($con,"select * from cart where ip_add='$ip'");
		$count=mysqli_num_rows($run);
		
	}
	else{
		$ip=getIp();
		global $con;
		$ip=getIp();
		$run=mysqli_query($con,"select * from cart where ip_add='$ip'");
		$count=mysqli_num_rows($run);
		
	}
	echo $count;
}

function totalprice(){
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
			$value=array_sum($product_price);
			$total +=$value;
		}
	}
	echo $total;
}


	                  /* select  categorie from database  show on sidebar*/
function getcat(){
	global $con;
	$result="select * from categories";
	$result1=mysqli_query($con,$result);
	while($result2=mysqli_fetch_array($result1))
	{
		$cat_id=$result2['cat_id'];
		$cat_title=$result2['cat_title'];
		echo "<li><a href='main.php?cat=$cat_id'>$cat_title</a></li>";
	}
}
function getcatpro(){
	 if(isset($_GET['cat']))
	 {
		 $cat_id=$_GET['cat'];
		 global $con;
		 $run=mysqli_query($con,"select * from products where product_cat='$cat_id'");
		 $count1=mysqli_num_rows($run);
		 if($count1==0)
		 {
			 echo"<h2> There is no product in this category !</h2>";
			 exit();
		 }
		 else{
		 while($row=mysqli_fetch_array($run))	 
		 {
			 $pro_id=$row['product_id'];
			 $pro_cat=$row['product_cat'];
			 $pro_image=$row['product_image'];
			 $pro_price=$row['product_price'];
			 $pro_title=$row['product_title'];
			 
			 echo"
			 <div id='first'>
			 <h3>$pro_title</h3>
			 <img src='product_images/$pro_image' width='130' height='160' />
			 <p><b> $pro_price</b></p>
			 <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
			 <a href='main.php?add_cart=$pro_id'><button style='float:right'>Add to cart</a>
			 </div>";
		 }
		 }
	}
}
                                                    /* select  brand from database  show on sidebar*/
function getbrand(){
	global $con;
	$result="select * from brands";
	$result1=mysqli_query($con,$result);
	while($result2=mysqli_fetch_array($result1))
	{
		$brand_id=$result2['brand_id'];
		$brand_title=$result2['brand_title'];
		echo "<li><a href='main.php?brand=$brand_id'>$brand_title</a></li>";
	}
}
function getbrandpro()
{
	if(isset($_GET['brand']))
	{
		$brand_id=$_GET['brand'];
		global $con;
		$run=mysqli_query($con,"select * from products where product_brand=$brand_id");
		$count1=mysqli_num_rows($run);
		 if($count1==0)
		 {
			 echo"<script>alert(<h2> There is no product in this Brand !</h2>)</script>";
			 exit();
		 }
		 else{
		while($row=mysqli_fetch_array($run))
		{
			$pro_id=$row['product_id'];
			$pro_title=$row['product_title'];
			$pro_image=$row['product_image'];
			$pro_price=$row['product_price'];
			$pro_cat=$row['product_cat'];
			
			echo"
			<div id='first'>
			<h3>$pro_title</h3>
			<img src='product_images/$pro_image' width='160' height='160' />
			 <p><b> $pro_price</b></p>
			 <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
			 <a href='main.php?add_cart=$pro_id'><button style='float:right'>Add to cart</a>
			 </div>";
		
		}
		 }
		
	}
}
                                                          /* select  categorie  show on  dropdown on insert.php*/
function getcat1(){
	global $con;
	$result="select * from categories";
	$result1=mysqli_query($con,$result);
	while($result2=mysqli_fetch_array($result1))
	{
		$cat_id=$result2['cat_id'];
		$cat_title=$result2['cat_title'];
		echo "<option value='$cat_id'>$cat_title</option>";
	}
}                                                         
                                                                 /* select  brand   show on  dropdown on insert.php*/
function getbrand1(){
	global $con;
	$result="select * from brands";
	$result1=mysqli_query($con,$result);
	while($result2=mysqli_fetch_array($result1))
	{
		$brand_id=$result2['brand_id'];
		$brand_title=$result2['brand_title'];
		echo "<option value='$brand_id'>$brand_title</option>";
	}
} 
                                                                                /* select  product from database and  show on  main page */
																				/*  main   container*/
function getpro(){
	global $con;
	if(!isset($_GET['cat']))
	{
		if(!isset($_GET['brand']))
		{
	$get_pro ="select * from products order by rand() limit 0,11";
	
	$run_pro=mysqli_query($con,$get_pro);
	while($row_pro=mysqli_fetch_array($run_pro))
	{
	$pro_id= $row_pro['product_id'];
	$pro_price= $row_pro['product_price'];
	$pro_des= $row_pro['product_des'];
	$pro_brand= $row_pro['product_brand'];
	$pro_title= $row_pro['product_title'];
	$pro_cat= $row_pro['product_cat'];
	$pro_keyword= $row_pro['product_keyword'];
	$pro_image= $row_pro['product_image'];
	
	
	echo "<div id='first'>
	<h2> $pro_title</h2>
	
	<img src='product_images/$pro_image' width='130' height='160' />
	
    <p><b>PRICE=$pro_price</b></p>
	<a href='detail.php?pro_id=$pro_id' style='float:left; color:light-blue; padding:10px;'>Details</a>
	<a href='main.php?add_cart=$pro_id'><button style='float:right color:gray'>Add to cart</button></a>
	</div>";
	
	}
		}
	}
}
function myfunction()
{
	if(isset($_GET['submit']))
	{
		$search=$_GET['search'];
		$run=mysqli_query($con,"select * from products where product_keyword like '%$search%'");
		while($row=mysqli_fetch_array($run))
		{
			$pro_id=$row['product_id'];
			$pro_image=$row['product_image'];
			$pro_title=$row['product_title'];
			$pro_cat=$row['product_cat'];
			$pro_price=$row['product_price'];
			$pro_brand=$row['product_brand'];
			echo"
			<div id='first'>
			<h3>$pro_title</h3>
			<img src='product_images/$pro_image' width='160' height='160' />
			 <p><b> $pro_price</b></p>
			 <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
			 <a href='main.php?add_cart=$pro_id'><button style='float:right'>Add to cart</a>
			 </div>";
			
		}
	}
}
?>
<html>
<head><link rel="stylesheet" href="main.css"></head>
 <script>
function myFunction() {
    alert("<h2> There is no product in this category !</h2>");
}
</script>
</html>