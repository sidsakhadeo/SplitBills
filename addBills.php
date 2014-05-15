<?php
	session_start();
	
	$con = mysql_connect("localhost","root","sid91phe");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	//$con=mysql_connect("localhost","root","");
	mysql_select_db("apartment",$con);
	
	$billName = $_POST['billName'];
	$date = $_POST['date'];
	$date=date("Y-m-d", strtotime($date));	
	$whoPaid = $_POST['whoPaid'];
	
	//echo $billName."<br/>".$date."<br/>".$whoPaid;
	
	$query="INSERT INTO bills(billName, date, whoPaid) VALUES(\"$billName\",\"$date\", \"$whoPaid\")";
	$sql=mysql_query($query);
	
	$query="SELECT * FROM bills ORDER BY billNo DESC LIMIT 0,1";
	$display=mysql_query($query);
	while($row=mysql_fetch_array($display))
	{
		$billNoGot=$row['billNo'];
		//echo $billNoGot;
	}
	
	$_SESSION['billNoSent']=$billNoGot;
	header("Location: addItems.php");
?>