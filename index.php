   
<!DOCTYPE html> 
<html> 
<style> 
    /*set border to the form*/ 
      
    form { 
        border: 3px solid #f1f1f1; 
    } 
    /*assign full width inputs*/ 
      
    input[type=text], 
    input[type=password] { 
        width: 60%; 
        padding: 12px 20px; 
        margin: 8px 2px; 
        display: inline-block; 
        border: 1px solid #ccc; 
        box-sizing: border-box; 
    } 
    /*set a style for the buttons*/ 
      
    button { 
        background-color: #4CAF50; 
        color: white; 
        padding: 14px 20px; 
        margin: 8px 0; 
        border: none; 
        cursor: pointer; 
        width: 50%; 
    } 
    /* set a hover effect for the button*/ 
      
    button:hover { 
        opacity: 0.8; 
    } 
    /*set extra style for the cancel button*/ 
      
    .cancelbtn { 
        width: auto; 
        padding: 10px 18px; 
        background-color: #f44336; 
    } 
    /*centre the display image inside the container*/ 
      
    .imgcontainer { 
        text-align: center; 
        margin: 24px 0 12px 0; 
    } 
    /*set image properties*/ 
      
    /*img.avatar { 
        width: 40%; 
        border-radius: 50%; 
    }*/
    /*set padding to the container*/ 
      
    .container { 
        padding: 5px;
        text-align: center; 
        margin-left: 3px;
    } 
    .container1 { 
        padding: 9px,5px;
        text-align: center; 
    } 
    /*set the forgot password text*/ 
      
    span.psw { 
        float: right; 
        padding-top: 16px; 
    } 
    /*set styles for span and cancel button on small screens*/ 
      
    @media screen and (max-width: 300px) { 
        span.psw { 
            display: block; 
            float: none; 
        } 
        .cancelbtn { 
            width: 50%; 
        } 
    } 
    div {
        padding-top: 10px;
        padding-right: 30px;
        padding-bottom: 50px;
        padding-left: 80px;
    }
</style> 
  
<body>
    <br><br><br><br><br><br><br>
    <div align="center">
    <form method="post" action="cart.php" style="width: 40%; text-align: center;">
    <h1>Login Form</h1> 
        <div class="container"> 
            <label><b>Username  </b></label> 
            <input type="text" placeholder="Enter Username" name="username" required> 
        </div>
        <div class="container">
            <label><b>Password  </b></label> 
            <input type="password" placeholder="Enter Password" name="password" required> 
        </div>
        <div class="container1">
            <button onclick="cart.php">Login</button> <br>
        </div> 
    </form>
</div>
</body>
</html> 

    

    <?php

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    if (!empty($username)){
    if (!empty($password)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "db1";
    // Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
    }
    else{
    $sql = "INSERT INTO login1 (Username, Password)
    values ('$username','$password')";
    if ($conn->query($sql)){
       // header("scan.html")
    //echo "New record is inserted sucessfully";
    }
    else{
    echo "Error: ". $sql ."
    ". $conn->error;
    }
    $conn->close();
    }
    }
    else{
    echo "Password should not be empty";
    die();
    }
    }
    else{
  //  echo "Username should not be empty";
    die();
    }
    ?>
 