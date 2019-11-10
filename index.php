<!DOCTYPE html>
<html>
	<head>
		<title>Shopping Cart</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/custom.css"/>	
		
        <script>
        function getcart()
        {
           // var uid=$("#uid").val();
     
                //var pwd=$("#pwd").val();
                //"ajax-check-uid.php?uid="+uid+"&pwd="+pwd;
                 alert(1);
                $.getJSON("json-fetch-cart.php",function(aryJson)
                {
//                    console.log(aryK)
                    alert(2);
                    alert(aryJson);
                    //alert(JSON.stringify(aryJson));
                    if(aryJson.length==0)
                        {
                            alert("no details found");
                            
                            return;
                        }
                   var q=["cart1q","cart2q","cart3q","cart4q","cart5q","cart6q","cart7q"];
                   var i=["cart1i","cart2i","cart3i","cart4i","cart5i","cart6i","cart7i"];
                   var p=["cart1p","cart2p","cart3p","cart4p","cart5p",,"cart6p",,"cart7p"];
                    var t=0;
                    for (var j=0;j<aryJson.length;j++)
                        
                        {
                            var obj = aryJson[j];
                            document.getElementById(q[j]).innerHTML=obj.quantity;
                            
                            document.getElementById(i[j]).innerHTML=obj.name;
                            
                            document.getElementById(p[j]).innerHTML=obj.price;
                            
                            t=t+ (parseInt(document.getElementById(p[j]).innerHTML))*
                                (parseInt(document.getElementById(q[j]).innerHTML));
                            
                        }
                    
                    document.getElementById("total").innerHTML=t;
                    
                  
    //        $("#hdn").val(pic);     
           // $("#dob").val(dob);     
                });
            
        }
        
        </script>	
	</head>

	<body>
		
		<nav class="navbar">
			<div class="container">
				<a class="navbar-brand" href="#">Your Cart</a>
				<div class="navbar-right">
					<div class="container minicart"></div>
				</div>
			</div>
		</nav>
		
		<div class="container-fluid breadcrumbBox text-center">
			<ol class="breadcrumb">
				<li><a href="scan.php">Scan More</a></li>
				<li class="active"><a href="#" onclick="getcart();">Order</a></li>
				<li><a href="payment.php">Payment</a></li>
			</ol>
		</div>
		
		<div class="container">
			
			<div class="col-md-12 col-sm-12 text-left">
				<ul>
					<li class="row list-inline columnCaptions">
						<span>QTY</span>
						<span>ITEM</span>
						<span>Price</span>
					</li>
					<li class="row">
						<span class="quantity" id="cart1q"></span>
						<span class="itemName" id="cart1i"></span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price" id="cart1p"></span>
					</li>
					<li class="row">
						<span class="quantity" id="cart2q"></span>
						<span class="itemName" id="cart2i"></span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price" id="cart2p"></span>
					</li>
					<li class="row">
						<span class="quantity" id="cart3q" ></span>
						<span class="itemName" id="cart3i"></span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price" id="cart3p"></span>				
					</li>
					<li class="row">
						<span class="quantity" id="cart4q"></span>
						<span class="itemName" id="cart4i"></span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price" id="cart4p"></span>
					</li>
					<li class="row">
						<span class="quantity" id="cart5q"></span>
						<span class="itemName" id="cart5i"></span>
						<span class="popbtn"  data-parent="#asd" data-toggle="collapse" data-target="#demo"><a class="arrow"></a></span>
						<span class="price" id="cart5p"></span>				
					</li>
					<li class="row">
						<span class="quantity" id="cart6q"></span>
						<span class="itemName" id="cart6i"></span>
						<span class="popbtn"  data-parent="#asd" data-toggle="collapse" data-target="#demo"><a class="arrow"></a></span>
						<span class="price" id="cart6p"></span>				
					</li>
					<li class="row">
						<span class="quantity" id="cart7q"></span>
						<span class="itemName" id="cart7i"></span>
						<span class="popbtn"  data-parent="#asd" data-toggle="collapse" data-target="#demo"><a class="arrow"></a></span>
						<span class="price" id="cart7p"></span>				
					</li>
					<li class="row totals">
						<span class="itemName">Total:</span>
						<span class="price" id="total"></span>
						<span class="order"> <a class="text-center" href="payment.php">ORDER</a></span>
					</li>
				</ul>
			</div>

		</div>

		<!-- The popover content -->

		<div id="popover" style="display: none">
			<a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="#"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
		
		<!-- JavaScript includes -->

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
		<script src="js/bootstrap.min.js"></script>
		<script src="js/customjs.js"></script>

	</body>
</html>