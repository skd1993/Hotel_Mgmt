<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>VVS Hotel DBMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="header">
	<a href="index.html" id="logo"><img src="images/logo.jpg" alt="" width="507" height="88" /></a>																																																																																					
	<span>Traditionally  Royal  hotel</span>
	<ul id="menu">
			<li><a href="index.html">Home</a></li>
			<li><a href="index.html">Services</a></li>
			<li><a href="employee.php">Employees Corner</a></li>
			<li><a href="history.php">Room History</a></li>
			<li><a href="#">Checkout</a></li>
			<li><a href="#">Locations</a></li>
			<li><a href="contacts.html">Contacts</a></li>
  </ul>
		<img src="images/image.jpg" alt="" width="1000" height="311" /><br />
</div>
	<div id="content">
		<div class="inside">
			<div id="sidebar">
			  <div class="order">
				  <form action="checkout.php" method="POST" class="forms">
				    <table width="229" height="79" border="0">
				      <tr>
				        <td>Enter room number</td>
				        <td><input type="text" name="room" required /></td>
			          </tr>
			        </table>
				    <input type="submit" value="Submit" />
</form>
				</div>
			</div>
		  <div id="center">
				
			  <div class="block">
				<h4>CHEckout</h4>
			      <p>&nbsp;</p>
			      <p>Please enter the details on the left to process the checkout.</p>
			      <p>Thank you for the stay!</p>
			      <p>Do come back!</p>

			         <?php
	include 'config.php';
	if(isset($_POST['room'])){
		
		$room = $_POST['room'];
		
		$query1 = mysql_query("SELECT * FROM `room_occ` WHERE `room no`='$room' AND `state`=1");
		
		if(mysql_num_rows($query1) > 0){
			if(mysql_query("UPDATE `room_occ` SET `state`=0 WHERE `room no`='$room'")){
				?><script>alert("Room status changed");</script><?php
			}
		}
		else{
			?><script>alert("Either the room number has not been entered properly or the room is already vacant");</script><?php
		}
		
	}
?>


			  </div>
				
	</div>
		  <div id="footer">
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="index.html">Services</a></li>
			<li><a href="employee.php">Employees Corner</a></li>
			<li><a href="history.php">Room History</a></li>
			<li><a href="#">Checkout</a></li>
			<li><a href="#">Locations</a></li>
			<li><a href="contacts.html">Contacts</a></li>
		</ul>																																																												
</div>
	</div>
</body>
</html>
