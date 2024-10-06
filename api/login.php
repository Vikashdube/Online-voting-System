<?php
session_start();
include("connect.php");


  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  $role = $_POST['role'];

 
  $sql = "SELECT * FROM user WHERE mobile='$mobile' AND password='$password' AND role='$role'  ";

  $check = mysqli_query($conn,$sql);

  if(mysqli_num_rows($check)>0){

        $userdata = mysqli_fetch_array($check);
        $group = mysqli_query($conn, "SELECT * FROM user WHERE role=2");

        $groupsdata = mysqli_fetch_all($group,MYSQLI_ASSOC);

        $_SESSION['userdata'] =$userdata;
        $_SESSION['groupsdata'] = $groupsdata;
     
        echo '
            <script>
                window.location = "dashbord.php";
            </script>
        
        ';

  }
  else{

       echo '
             <script>
                alert("Invalid Credential");
                window.location ="../";
       
             </script>
       ';
  }







?>