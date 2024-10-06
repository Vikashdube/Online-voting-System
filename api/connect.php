<?php

 $conn = mysqli_connect("localhost","root","","voting");


 if($conn){
   //  echo "connect";
 }
 else{
    echo "not" . mysqli_connect_error();

 }




?>