<?php
	include 'config.php';
	if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['contact']) && isset($_POST['age']) && isset($_POST['sex']) && isset($_POST['type']) && isset($_POST['departure'])){
		
		$name = $_POST['name'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$age = $_POST['age'];
		$sex = $_POST['sex'];
		$type = $_POST['type'];
		$departure = $_POST['departure'];
		
		$query1 = mysql_query("SELECT * FROM `room_occ` WHERE `state`=0 AND `type`='$type' ORDER BY `id` ASC LIMIT 1");
		
		if(mysql_num_rows($query1)>0){
			$fetch1 = mysql_fetch_array($query1);
			$roomNo = $fetch1['room no'];
			$query2 = mysql_query("SELECT `customer ID` FROM `customer_info` ORDER BY `id` DESC LIMIT 1");
			
			if(mysql_num_rows($query2) > 0){
				$fetch2 = mysql_fetch_array($query2);
				$old = substr($fetch2['customer ID'],4);
				$new = $old+1;
				$custID = "cust".$new;
			}
			else{
				$custID = "cust1";
			}
			
			$query3 = mysql_query("INSERT INTO `customer_info` (`customer ID`,`name`,`address`,`contact`,`age`,`sex`) VALUES('$custID','$name','$address','$contact','$age','$sex')");
			$query4 = mysql_query("UPDATE `room_occ` SET `state`=1 WHERE `room no`='$roomNo'");
			$query5 = mysql_query("INSERT INTO `room_hist` (`room no`,`customer_id`,`start`,`end`) VALUES('$roomNo','$custID',NOW(),'$departure')");
			if($query3 && $query4 && $query5){
				?><script>alert('Your room no is <?php echo $roomNo; ?>');</script><?php
			}
		}
		
		else{
			?><script>alert("Sorry.There is no vacancy in <?php echo $type; ?> rooms.");</script><?php
		}
	
	}
?>
