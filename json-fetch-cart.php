<?php
        include_once("doconnect.php");
     //   $uidd=$_GET['id'];
        $query="select * from `order` ";
 
        $table=mysqli_query($dbRef,$query);
                 
        //   0/1   possibility
 
        $ary=array();
        while($row=mysqli_fetch_array($table))
        {
            $ary[]=$row;
        }
        echo json_encode($ary); 
                 
             
            ?>