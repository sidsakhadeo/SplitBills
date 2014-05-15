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
    <script>
    $(function() {
        $( "#datepicker" ).datepicker({
			showOtherMonths: true,
            selectOtherMonths: true,
			maxDate: +0
		});
	});
    </script>
	<script language="javascript" type="text/javascript">
	
	function validation(form)
	{
		var billName = document.getElementById("billName").value;
		var date = document.getElementById("datepicker").value;
		var whoPaid = document.getElementById("whoPaid").value;
		
		var error="The following problems were found:";
		
		if(billName=="")
			error+="Bill Name";
		if(date=="")
			error+="Date";
		if(whoPaid=="")
			error+="Who Paid?";
			
		if(error!="The following problems were found:")
			alert(error);
		else
			ajaxFunction(billName, date, whoPaid);
	}
	
	function ajaxFunction(billName, date, whoPaid)
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
	
		var queryString ="?billName=" + billName + "&date=" + date + "&whoPaid=" + whoPaid;
	
		ajaxRequest.open("GET", "addBills.php" + queryString , true);
		ajaxRequest.send(null);
		
		document.BreakdownForm.reset();

	}
	</script>
</head>

<body>
	<form>
		
		<label for="billName">Bill Name</label><input type="text" id="billName" name="billName" /><br/>
		<label for="date">Date</label><input type="text" id="datepicker" name="date" /><br/>
		<label for="whoPaid">Who Paid?</label><input type="text" id="whoPaid" name="whoPaid" />
			
		<input type="button" value="Submit" id="submit" onClick="validation()" />
	
	</form>
	
	<div id="ajaxDiv" align="center">Your result will be displayed here</div>
</body>
</html>