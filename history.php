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
			<li><a href="#">Room History</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<li><a href="#">Locations</a></li>
			<li><a href="contacts.html">Contacts</a></li>
  </ul>
		<img src="images/image.jpg" alt="" width="1000" height="311" /><br />
</div>
	<div id="content">
		<div class="inside">
			<div id="sidebar">
			  <div class="order">
				  <form action="history.php" method="POST" class="forms">
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
				<h4>Room History</h4>
			      <p>&nbsp;</p>
			      <p>We are proud to have the following members as our guests.</p>

			                       <?php
	include 'config.php';
	if(isset($_POST['room'])){
		
		$room = $_POST['room'];
		
		$query1 = mysql_query("SELECT `id` FROM `room_hist` WHERE `room no`='$room' ORDER BY `id` ASC LIMIT 1");
		
		if(mysql_num_rows($query1) > 0){
			?>
			Room history for <?php echo $room; ?><br>
			<table>
				<tr>
					<th>S.No.</th>
					<th>Customer Name</th>
					<th>Arrival</th>
					<th>Departure</th>
				</tr>
			<?php
			$query2 = mysql_query("SELECT `customer_info`.`name`,`room_hist`.* FROM `room_hist` INNER JOIN `customer_info` ON `customer_info`.`customer ID`=`room_hist`.`customer_id` ");
				$i=0;
			while($row = mysql_fetch_array($query2)){
			?>
				<tr>
					<td><?php echo ++$i; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['start']; ?></td>
					<td><?php echo $row['end']; ?></td>
				</tr>
			<?php
			}
			echo '</table>';
		}
		else{
			?><script>alert("No history available for this room");</script><?php
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
			<li><a href="#">Room History</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<li><a href="#">Locations</a></li>
			<li><a href="contacts.html">Contacts</a></li>
		</ul>																																																												
</div>
	</div>
</body>
</html>
