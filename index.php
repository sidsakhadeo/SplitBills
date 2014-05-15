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
</head>

<body>
	<h1><center>Add the Bill Details to be split</center></h1>
	
	<form action="addBills.php" method="post">
	<table align=center>
	
		<tr><td><label for="billName">Bill Name</label></td><td>:</td><td><input type="text" id="billName" name="billName" /></td></tr>
		<tr><td><label for="date">Date</label></td><td>:</td><td><input type="text" id="datepicker" name="date" /></td></tr>
		<tr><td><label for="whoPaid">Who Paid?</label></td><td>:</td><td><input type="text" id="whoPaid" name="whoPaid" /></td></tr>
			
		<tr><td colspan=3 align=center><input type="submit" value="Submit" id="submit" /></td><td></td><td></td></tr>
		
	</table>
	</form>

</body>
</html>