<?php

 include("connect.php");

   $name = $_POST['name'];
   $mobile = $_POST['mobile'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $address = $_POST['address'];

   $image = $_FILES['photo']['name'];
   $tmp_name = $_FILES['photo']['tmp_name'];

   $role = $_POST['role'];


  if($password==$cpassword){
     
      move_uploaded_file($tmp_name ,"../uploads/$image");

      $sql = "INSERT INTO `user` (`name`, `mobile`, `password`, `address`, `photo`, `role`, `status`, `votes`)
                        VALUES ('$name', '$mobile', '$password', '$address', '$image', '$role', 0, 0)";

        $insert = mysqli_query($conn,$sql);

        if($insert){
          echo "
          <script>

                       alert('Registration sucessful ');
           
                        window.location = 'index.html';
  
                     </script>
                    ";
        }

        else{
          echo "
                 <script>
                       alert('some error');
           
                        windows.location = './Registration.html';
                  </script>      ";
        }

  }else{
         echo "
               <script>

                   alert('password and Conform password does not match ');
                    
                   windows.location = 'Registration.html';
           
                </script>
         ";
  }

   

?>