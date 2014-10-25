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
			<li><a href="#">Employees Corner</a></li>
			<li><a href="history.php">Room History</a></li>
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
					<form action="employee.php" method="POST">
					  <p>Add Employee</p>
	                  <table width="200" border="0">
	                    <tr>
	                      <td>Name</td>
	                      <td><input type="text" name="name" required /></td>
                        </tr>
	                    <tr>
	                      <td><label for="address">Address</label></td>
	                      <td><textarea name="address" cols="17" required></textarea></td>
                        </tr>
	                    <tr>
	                      <td>Contact</td>
	                      <td><input type="text" name="contact" required /></td>
                        </tr>
	                    <tr>
	                      <td><label for="age2">Age</label></td>
	                      <td><input type="text" name="age" required /></td>
                        </tr>
	                    <tr>
	                      <td><label for="sex2">Sex</label></td>
	                      <td>Male
	                        <input type="radio" name="sex" value="Male" required />
Female
<input type="radio" name="sex" value="Female" required /></td>
                        </tr>
	                    <tr>
	                      <td><span class="forms">Designation</span></td>
	                      <td><span class="forms">
	                        <select name="desg" required>
	                          <option value="Manager">Manager</option>
	                          <option value="Waitor">Waitor</option>
	                          <option value="Bell Boy">Bell Boy</option>
	                          <option value="Receptionist">Receptionist</option>
                          </select>
	                      </span></td>
                        </tr>
                      </table>
	                  <p>
	                    <input type="submit" value="Submit" />
	                  </p>
                  </form>
				</div>
			</div>
		  <div id="center">
				
			  <div class="block">
				<h4>Our employees</h4>
			      <p>&nbsp;</p>
			      <p>We are proud to have the following members as our employees who are always willing to cater to the needs of our customers and giving them an unforgettable experience.</p>
				  <?php
	include 'config.php';
	if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['contact']) && isset($_POST['age']) && isset($_POST['sex']) && isset($_POST['desg'])){
		
		$name = $_POST['name'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$age = $_POST['age'];
		$sex = $_POST['sex'];
		$designation = $_POST['desg'];
		
		$query1 = mysql_query("SELECT `emp ID` FROM `employee` ORDER BY `id` DESC LIMIT 1");
		
		if(mysql_num_rows($query1) > 0){
			$fetch1 = mysql_fetch_array($query1);
			$old = substr($fetch1['emp ID'],3);
			$new = $old+1;
			$empID = "emp".$new;
		}
		else{
			$empID = "emp1";
		}
		
		if($designation=="Manager")
			$type=1;
		else if($designation=="Waitor")
			$type=2;
		else if($designation=="Bell Boy")
			$type=3;
		else if($designation=="Receptionist")
			$type=4;
		
		$query3 = mysql_query("INSERT INTO `employee` (`emp ID`,`emp_name`,`emp_addr`,`emp_phone`,`emp_age`,`emp_sex`,`emp_type`,`emp_desg`) VALUES('$empID','$name','$address','$contact','$age','$sex','$type','$designation')");
		if($query3){
			?><script>alert('New employee added');</script><?php
		}
	
	}
?>

			                       <?php
	include 'config.php';
		
		$query1 = mysql_query("SELECT * FROM `employee`");
		?>
		<table>
			<tr>
				<th>S.No.</th>
				<th>Employee Name</th>
				<th>Designation</th>
				<th>Contact</th>
			</tr>
		<?php
			$i=0;
			while($row = mysql_fetch_array($query1)){
		?>
<tr>
					<td><?php echo ++$i; ?></td>
					<td><?php echo $row['emp_name']; ?></td>
					<td><?php echo $row['emp_desg']; ?></td>
					<td><?php echo $row['emp_phone']; ?></td>
				</tr>
		<?php
			}
		echo '</table>';
?>
			  </div>
				
	</div>
		  <div id="footer">
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="index.html">Services</a></li>
			<li><a href="#">Employees Corner</a></li>
			<li><a href="history.php">Room History</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<li><a href="#">Locations</a></li>
			<li><a href="contacts.html">Contacts</a></li>
		</ul>																																																												
</div>
	</div>
</body>
</html>
