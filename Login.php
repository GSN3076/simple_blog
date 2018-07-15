
                
 <?php  
    session_start();
    if(isset($_SESSION['Uname'])){
        header('location:index.php');
    }

 ?>

<?php  include('./inc/header.php'); ?>
        <div class="container">
        <h2> Admin Login</h2>
        </div>
     <div class ="container">
     <a href="Register.php">Register Here</a>
     </div>

                <div class="container ">
                
               
                <form class="form-control" align="center" method="post" action="login.php">
                
                        <div class="form-group " >
                            <label for="uname">Email:  </label>
                                <input type="email" name="email"  required>
                            </div>
                            <div  class="form-group" >
                                <label for="password" >Password:</label>
                                <input type="text" name="pass"  required >
                            </div>
                            <div  class="form-group">
                                <input type="submit" name="login" value="Login" >
                    </div>
            </form>
            </div>

    </body>
</html>

<?php 
  
  include('config/db.php');
  
  if(isset($_POST['login'])){
      $email=$_POST['email'];
      $username = $_POST['uname'];
      $password = $_POST['pass'];

      $qry = "SELECT * FROM `admin` WHERE   `email`='$email' AND `password` ='$password' ";

     $res = mysqli_query ($conn,$qry);
     $row = mysqli_num_rows($res);
     
      if($row<1){
          ?> <script>
          alert('Username and Password are not match.');
          window.open('login.php','_self');
          </script>
          
          <?php 
      }  else{
          $data = mysqli_fetch_assoc($res);
          $user = $data['username'];

           $id =$data['email'];
          
           $_SESSION['Uname'] = $user;
          header('location:index.php');

      }
  }
  