<?php
	session_start();
	//echo $_SESSION['billNoSent'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Add Bills</title>
	
	<meta charset="utf-8" />
    <link href="jquery-ui-1.9.1.custom/css/pepper-grinder/jquery-ui-1.9.1.custom.css" rel="stylesheet">
	<script src="jquery-ui-1.9.1.custom/js/jquery-1.8.2.js"></script>
	<script src="jquery-ui-1.9.1.custom/js/jquery-ui-1.9.1.custom.js"></script>
    <!--<link rel="stylesheet" href="/resources/demos/style.css" />-->
   
	<script language="javascript" type="text/javascript">
	
	function validation(form)
	{
		var itemName = document.getElementById("itemName").value;
		var price = document.getElementById("price").value;
		var ankit, aseem, siddharth;
		
		if(document.getElementById("ankit").checked)
			ankit=1;
		else
			ankit=0;
		
		
		if(document.getElementById("aseem").checked)
			aseem=1;
		else
			aseem=0;
		
		if(document.getElementById("siddharth").checked)
			siddharth=1;
		else
			siddharth=0;
		//alert("Ankit: "+ankit+" Aseem:"+aseem+" Siddharth:"+siddharth);
		
		var error="The following problems were found:";
		
		if(itemName=="")
			error+="\nItem Name";
		if(price=="")
			error+="\nPrice";
		if(ankit==0 && aseem==0 && siddharth==0)
			error+="\nCheck people";
		
		//alert(isNaN(parseFloat(price)));
		if(parseInt(price) != price)
		{
			if(isNaN(parseFloat(price)))
				error+="Price is not numeric";
		}
		
		if(error!="The following problems were found:")
			alert(error);
		else
			ajaxFunction(itemName, price, ankit, aseem, siddharth);
	}
	
	function ajaxFunction(itemName, price, ankit, aseem, siddharth)
	{
		var ajaxRequest;  // The variable that makes Ajax possible!
	
		try
		{
			// Opera 8.0+, Firefox, Safari
			ajaxRequest = new XMLHttpRequest();
		} 
		catch (e)
		{
			// Internet Explorer Browsers
			try
			{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} 
			catch (e)
			{
				try
				{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} 
				catch (e)
				{
				// Something went wrong
					alert("Your browser broke!");
					return false;
				}
			 }
		}
		// Create a function that will receive data sent from the server
	
		ajaxRequest.onreadystatechange = function()
		{
			if(ajaxRequest.readyState == 4)
			{
				var ajaxDisplay = document.getElementById('ajaxDiv');
				ajaxDisplay.innerHTML = ajaxRequest.responseText;
			}
		}
	
		var queryString ="?itemName=" + itemName + "&price=" + price + "&aseem=" + aseem + "&ankit=" + ankit+ "&siddharth=" + siddharth;
	
		ajaxRequest.open("GET", "addItemsCode.php" + queryString , true);
		ajaxRequest.send(null);
		
		document.addItems.reset();

	}
	</script>
</head>

<body>
	<h1><center>Add the Bill Details to be split</center></h1>
	
	<form name="addItems" action="billSplitDetails.php" method="post">
	<table align=center>
	
		<tr><td><label for="itemName">Item Name</label></td><td>:</td><td><input type="text" id="itemName" name="itemName" /></td></tr>
		<tr><td><label for="price">Price</label></td><td>:</td><td><input type="text" id="price" name="price" /></td></tr>
		
		<tr><td align=center colspan=3><label for="ankit">Ankit</label><input type="checkbox" id="ankit" name="ankit" />
		<label for="aseem">Aseem</label><input type="checkbox" id="aseem" name="aseem" />
		<label for="siddharth">Siddharth</label><input type="checkbox" id="siddharth" name="siddharth" /></td></tr>
			
		<tr><td align=center colspan=3><input type="button" value="Add Item" id="submit" onClick="validation(addItems)" />
		<input type="submit" value="Finish" id="finish" /></td></tr>
		
	</table>
	</form>
	
	<br/><br/><br/><br/><br/>
	<div id="ajaxDiv" align="center">Your result will be displayed here</div>
</body>
</html>