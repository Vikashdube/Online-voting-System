<?php

session_start();
if (!isset($_SESSION['userdata'])) {
    header("location:../");
}
$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0){
    $status = '<b style="color:red">Not Voted</b>';
}
else{
    $status = '<b style="color:green">Voted</b>';
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>

<body class="text-white bg-secondary">
    

    <nav class="navbar navbar-expand-lg text-white bg-warning">
        <a class="navbar-brand" href="#">
            <h2><b><i>Online Voting System</i></b></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <form class="form-inline my-2 my-lg-0 px-2">
            <a href="../index.html"><button type="button" class="btn btn-secondary ">Back</button></a>             
            <a href="logout.php"><button type="button" class="btn btn-success my-2">Logout</button></a>
            </form>
        </div>
    </nav>


<style>

    body{

  font-family: "Dancing Script", cursive;
  font-optical-sizing: auto;
  font-weight: weight;
  font-style: normal;

    }
  
  .profile{
    background-color:cadetblue ; 
    width: 30%;
    height: 55vh;
    margin-top: 45px;
    margin-left: 50px;
    /* align-items: center;
    text-align: center; */
    float: left;
  }
 .group{
    background-color:cadetblue;
    float: right;
    width: 60%;
    margin-top: 45px;
    margin-right: 30px;
 }    
 
 #votebtn{
    padding: 5px;
    font-size: 15px;
    background-color: green;
    color: white;
    border-radius: 5px;
    width: 90px;

 }


</style>










    <div class="profile text-white  ">
       

        <center> <img src="../uploads/ <?php  echo $userdata['photo'];    ?>" height="100" width="100"  ><br></center>
        <div class="mx-5 my-2"> 
        <b>Name:  </b><?php echo $userdata['name'];      ?><br> 
          <b>Mobile:  </b><?php echo $userdata['mobile'];  ?><br> 
          <b>Address:  </b><?php echo $userdata['address'];      ?><br>
          <b>Status:  </b><?php echo $status     ?><br> 
          </div>
        </div>

    








    <div class="group">
         <center> <h1 class="">List of Candidates</h1> </center>
            <hr>
          <?php
                  if($_SESSION['groupsdata'])
                  {
                         for($i=0; $i<count($groupsdata); $i++){

                             ?>
                                 <div>
                                     <div class="m-3"> <img style="float: right; " src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="90" width="90" > </div>
                                       
                                      <div class="mx-3">
                                    <b>Group Name: </b><?php echo $groupsdata[$i]['name']  ?><br><br>
                                    <b>Votes: </b><?php echo $groupsdata[$i]['votes']  ?><br><br>
                                    <form action="../api/vote.php" method="post">
                                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'];  ?>">
                                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'];  ?>">

                                        <input type="submit" name="votebtn" value="vote" id="votebtn"> <br>

                                    </form>
                                    </div>
                                 </div>
                                     <hr>

                             <?php

                         }

                  }
                  else{

                  }


            ?>
    </div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>