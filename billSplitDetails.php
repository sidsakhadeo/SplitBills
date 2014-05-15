<?php
	session_start();
	$billNo = $_SESSION['billNoSent'];
	
	$con = mysql_connect("localhost","root","sid91phe");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("apartment",$con);
	
	$ankitShare=0; $aseemShare=0; $sidShare=0;
	
	$display=mysql_query("SELECT price, aseem, ankit, siddharth FROM items WHERE billNo= $billNo");
	while($row=mysql_fetch_array($display))
	{
		if($row['ankit']==1 && $row['aseem']==0 && $row['siddharth']==0)
			$ankitShare+=$row['price'];
		elseif($row['ankit']==0 && $row['aseem']==1 && $row['siddharth']==0)
			$aseemShare+=$row['price'];
		elseif($row['ankit']==0 && $row['aseem']==0 && $row['siddharth']==1)
			$sidShare+=$row['price'];
		elseif($row['ankit']==1 && $row['aseem']==1 && $row['siddharth']==0)
		{
			$ankitShare+=$row['price']/2; 
			$aseemShare+=$row['price']/2;
		}
		elseif($row['ankit']==0 && $row['aseem']==1 && $row['siddharth']==1)
		{
			$aseemShare+=$row['price']/2; 
			$sidShare+=$row['price']/2; 
		}
		elseif($row['ankit']==1 && $row['aseem']==0 && $row['siddharth']==1)
		{
			$ankitShare+=$row['price']/2; 
			$sidShare+=$row['price']/2;
		}
		else
		{
			$ankitShare+=$row['price']/3; 
			$aseemShare+=$row['price']/3; 
			$sidShare+=$row['price']/3;
		}
	}
	
	$ankitShare=round($ankitShare,2);
	$aseemShare=round($aseemShare,2);
	$sidShare=round($sidShare,2);
	
	$total=$ankitShare+$aseemShare+$sidShare;
	
	//echo $ankitShare; echo $aseemShare; echo $sidShare;
	
	mysql_query("UPDATE bills SET bills.ankit=$ankitShare, bills.aseem=$aseemShare, bills.siddharth=$sidShare, bills.total=$total WHERE bills.billNo=$billNo");
	
	$display=mysql_query("SELECT * FROM bills WHERE billNo= $billNo");
	while($row=mysql_fetch_array($display))
	{
		$billNo1 = $row['billNo'];
		$billName = $row['billName'];
		$ankit = $row['ankit'];
		$aseem = $row['aseem'];
		$siddharth = $row['siddharth'];
		$total = $row['total'];
		$whoPaid = $row['whoPaid'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Add Bills</title>
</head>

<body>
	<h1><center>The final settlement is as follows:</center></h1>
	
	<?php
	
		echo "<table align=center border=1 bgcolor=\"LIGHTBLUE\"><tr>
		<th>Bill No</th>
		<th>Bill Name</th>
		<th>Ankit</th>
		<th>Aseem</th>
		<th>Siddharth</th>
		<th>Total</th>
		<th>Who Paid</th>
		</tr>";
		
		$display=mysql_query("SELECT * FROM bills WHERE billNo= $billNo");
		while($row=mysql_fetch_array($display))
		{
			echo "<tr bgcolor=\"LIGHTGREEN\">";
			echo "<td>".$row['billNo']."</td>";
			echo "<td>".$row['billName']."</td>";
			echo "<td>".$row['ankit']."</td>";
			echo "<td>".$row['aseem']."</td>";
			echo "<td>".$row['siddharth']."</td>";
			echo "<td>".$row['total']."</td>";
			echo "<td>".$row['whoPaid']."</td>";
		}
	echo "</table>";
	
	$display=mysql_query("SELECT * FROM items WHERE billNo= $billNo");
	
	echo "<h1><Center>The list of items is as follows:</center></h1>";
	echo "<table align=center border=1><tr bgcolor=\"LIGHTBLUE\">
	<th>Item Name</th>
	<th>Price</th>
	<th>Ankit</th>
	<th>Aseem</th>
	<th>Siddharth</th></tr>";
	
	while($row=mysql_fetch_array($display))
	{
		echo "<tr bgcolor=\"LIGHTGREEN\">";
		echo "<td>".$row['itemName']."</td>";
		echo "<td>".$row['price']."</td>";
		
		if($row['ankit']==1)
			echo "<td><img src='checkmark.png' height=30 width=30/></td>";
		else
			echo "<td><img src='crossmark.png' height=30 width=30/></td>";
			
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
	
	?>
	
</body>
</html>