<!DOCTYPE html>
<html lang="en">
  <head>
    
    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/ico/favicon.png">
  </head>
<?php
	session_start();
	$billNo = $_SESSION['billNoSent']; //echo $billNo;
	
	$itemName=$_GET['itemName']; //echo $itemName;
	$price=$_GET['price']; //echo $price;
	$ankit=$_GET['ankit'];  //echo $ankit;
	$aseem=$_GET['aseem']; //echo $aseem;
	$siddharth=$_GET['siddharth']; //echo $siddharth;
	
	$con = mysql_connect("localhost","root","sid91phe");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("apartment",$con);
	
	$query="INSERT INTO items(billNo, itemName, price, ankit, aseem, siddharth) VALUES($billNo, \"$itemName\", $price, $ankit, $aseem, $siddharth)";
	$sql=mysql_query($query);
	
	$display=mysql_query("SELECT * FROM items ORDER BY itemNo DESC LIMIT 0,1");
	
	echo "<table class='table table-striped' align=center border=1><tr>
	<th>Item Name</th>
	<th>Price</th>
	<th>Ankit</th>
	<th>Aseem</th>
	<th>Siddharth</th></tr>";
	
	while($row=mysql_fetch_array($display))
	{
		echo "<tr>";
		
		echo "<td>".$row['itemName']."</td>";
		echo "<td>".$row['price']."</td>";
		
		if($row['ankit']==1)
			echo "<td><i class='icon-ok'></i></td>";
		else
			echo "<td><i class='icon-remove'></i></td>";
			
		if($row['aseem']==1)
			echo "<td><img src='checkmark.png' height=30 width=30/></td>";
		else
			echo "<td><img src='crossmark.png' height=30 width=30/></td>";
		
		if($row['siddharth']==1)
			echo "<td><img src='checkmark.png' height=30 width=30/></td>";
		else
			echo "<td><img src='crossmark.png' height=30 width=30/></td>";
		echo "</tr>";
	}
	echo "</table>";
	
	mysql_close($con);
?>