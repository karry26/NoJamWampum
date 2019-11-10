<?php
include_once("doconnect.php");

	$name=$_GET["name"];
//    echo $name;
	$qty=$_GET["qty"];
	$price=$_GET["price"];
//echo $price;
//echo json_encode($price);
    $qty=(int)$qty;
    $price=(int)$price;
    
//$btn=$_GET["btn"];

	//$pwd=md5($pwd);


    $new_query="INSERT INTO `order` (`name`, `quantity`, `price`) VALUES ('$name',$qty,$price);";
//echo json_encode($new_query);

//	$query="insert into 'order'  values('$name',$qty,$price);";
//    
	mysqli_query($dbRef,$new_query);
	$msg=mysqli_error($dbRef);
	if($msg=="")
			echo json_encode("Record Saved");
	else
        echo json_encode($msg);
?> 