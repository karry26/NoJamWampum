<!DOCTYPE html>
<html>
<head>

  <title>Scanner</title>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  
<script src="js/angular.min.js"></script>
   <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    
<link rel="stylesheet" type="text/css" href="css/custom.css"/>	
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body ng-app="mymodule" ng-controller ="mycontroller" >
  <nav class="navbar align-content-center align-items-md-center">
			<div class="container">
				<a class="navbar-brand" href="#">Scan Here</a>
                <div class="offset-3 form-row"><div><input class="form-control " placeholder =" Search"  ></div><div><a href="map.html"><input type="button" class="btn-primary" value="Go"></a></div></div>
				<div class="navbar-right">
					<div class="container minicart"></div>
				</div>
			</div>
		</nav>
		<center>
		<div class="container-fluid breadcrumbBox text-center container">
			<ol class="breadcrumb" >
				<li class="active"><a href="scan.php">Scan Product</a></li>
				<li ><a href="cart.php" >Order</a></li>
				<li><a href="payment.php">Payment</a></li>
			</ol>
            </div></center>

  <div class=" form-row" >
<div class="col-md-7 offset-1 ">
    <h1>Scan Product QR</h1>
    <video id="preview"></video>
    <script >
    
    function getproduct(data)
        {
                $.getJSON("json-fetch-product.php?id="+data,function(aryJson)
                {
                    if(aryJson.length==0)
                        {
                            alert("no details found");
                            
                            return;
                        }
                   
                  var txt1=document.getElementById('mname');
                    txt1.innerHTML='<h2>'+aryJson[0].name+'</h2>';
                   var txt2=document.getElementById('mprice');
                     txt2.innerHTML='<h4>'+aryJson[0].price+'</h4>';
                    
                  
                   
                     
                    //====================
                 
                //-=--=-=-=====
            var pic=aryJson[0].pic; 
            $("#mpic").prop("src","images/"+pic);       
         
                });
            
        }
        function addcart()
        {
        var    qty = $("#mquantity").val();
            var    name1 = document.getElementById('mname');
            var name=name1.innerHTML;
            //
            var    price = document.getElementById('mprice').innerHTML;
            
           
            var qry="json-addcart.php?name="+name+"&price="+price+"&qty="+qty;
  
            $.getJSON(qry,function(aryJson)
                {
                    console.log(aryJson);
                alert("Added to Cart");
        });}
            
            
    
    </script>
    <script type="text/javascript">

      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
          //alert(content);
          
        var txt=document.getElementById('text');
        txt.innerHTML=content;
          
          getproduct(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
      </div>
      <div class="col-md-4">
         
          <!--<div class=" " id="modal">
			
			<div class="col-md-12 col-sm-12 text-left">
				<ul>
					<li class="row">
						<span class="quantity">1</span>
						<span class="itemName">Birthday Cake</span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price">$49.95</span>
					</li>
                </ul>
    </div>
    </div>-->
    <br>
    <br>
    <br>
     <div class="card" style="width: 18rem;" id='modal'>
  <img src="images/sprite.png" class="card-img-top " style="width:280px; height:200px;" alt="..." id="mpic">
  <div class="card-body">
      <div class="card-title" id="mname"  ><h2>Product</h2></div><br>
      <div class="card-title" id="mprice"><h4> Price</h4></div><br>
    <input type="text " placeholder="quantity" id="mquantity">
    <br>
    <br>
    <a href="#" class="btn btn-primary" onclick="addcart();">Add To Cart</a>
  </div>
</div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>s
    <p id="text"> </p>
    

    <div><a class="bg-primary"  href="cart.php">GO TO MY CART</a></div>
   
    </body>
</html>