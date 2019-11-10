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
  <!--  <script>
    var module = angular.module("mymodule",[]);
        module.controller("mycontroller", function ($scope,$http){
            $scope.fetchdetails = function(uid)
            {
                
            }
            
        }
                         )
    
    </script>-->
</head>

<body ng-app="mymodule" ng-controller ="mycontroller">

  <div class=" form-row" >
<div class="col-md-7 ">
    <h1>Scan Product QR</h1>
    <video id="preview"></video>
    <script >
    
    function getproduct(data)
        {
           // var uid=$("#uid").val();
     
                //var pwd=$("#pwd").val();
                //"ajax-check-uid.php?uid="+uid+"&pwd="+pwd;
                 alert(1);
                $.getJSON("json-fetch-product.php?id="+data,function(aryJson)
                {
//                    console.log(aryK)
                    alert(2);
                    
                    //alert(JSON.stringify(aryJson));
                    if(aryJson.length==0)
                        {
                            alert("no details found");
                            
                            return;
                        }
                   
                  var txt1=document.getElementById('mname');
                    txt1.innerHTML=aryJson[0].name;
                   var txt2=document.getElementById('mprice');
                     txt2.innerHTML=aryJson[0].price;
                    
                  
                   
                     
                    //====================
                 
                //-=--=-=-=====
            var pic=aryJson[0].pic; 
            $("#mpic").prop("src","uploads/"+pic);       
    //        $("#hdn").val(pic);     
           // $("#dob").val(dob);     
                });
            
        }
        function addcart()
        {
            alert(1);
            alert("Wwd");
        var    qty = $("#mquantity").val();
            var    name1 = document.getElementById('mname');
            var name=name1.innerHTML;
            //
            var    price = document.getElementById('mprice').innerHTML;
            
           alert(3);
            var qry="json-addcart.php?name="+name+"&price="+price+"&qty="+qty;
            alert("abc");
            alert(qry);
            $.getJSON(qry,function(aryJson)
                {
                    console.log(aryJson);
//                    alert(2,name,price,qty);
//                    
//                    //alert(JSON.stringify(aryJson));
//                    if(aryJson.length==0)
//                        {
//                            alert("no details found");
//                            
//                            return;
//                        }
                   
        });}
            
            
    
    </script>
    <script type="text/javascript">

      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
          alert(content);
          
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
      <div class="col-md-5">
         
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
     <div class="card" style="width: 18rem;" id='modal'>
  <img src="..." class="card-img-top" alt="..." id="mpic">
  <div class="card-body">
      <div class="card-title" id="mname"  >Card title</div>
    <div class="card-title" id="mprice"> Price</div>
    <input type="text " placeholder="quantity" id="mquantity">
    <a href="#" class="btn btn-primary" onclick="addcart();">Add To Cart</a>
  </div>
</div>
      </div>
    </div>
    <p id="text"> </p>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div><button class="bg-primary" onclick="showproduct();">SHOW PRODUCT</button></div>
   
    </body>
</html>