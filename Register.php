   
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
                            <form class="form-control" align="center" method="post" action="Register.php" enctype="multipart/form-data" >
                                <div class="form-group " >
                                            <label for="uname">Username:</label>
                                    <input type="text" name="username"  required>
                                            </div>
                                        <div class="form-group " >
                                            <label for="uname">Email:  </label>
                                                <input type="email" name="email"  required>
                                        </div>
                                        <div  class="form-group" >
                                            <label for="password" >Password:</label>
                                            <input type="password" name="password"  required >
                                            </div>
                                                <div class="form-group"> 
                                            <small>Select image to upload:</small>
                                            <input type="file" name="image"  >
                                            </div>
                                             <div  class="form-group">
                                  <input type="submit" name="register">
                                </div>
                            </form>
            </div>

    </body>
</html>

<?php 
  
  require ('config/config.php');
  require ('config/db.php');

  
  if(isset($_POST['register'])){
    //   $email=$_POST['email'];
    //   $username = $_POST['uname'];
    //   $password = $_POST['pass'];
                        $filename = $_FILES['image']['name'];
                        $tmp_filename = $_FILES['image']['tmp_name'];
                        move_uploaded_file($tmp_filename,"Images/$filename"); 
    
                        echo $filename;
                        $email = mysqli_real_escape_string($conn,$_POST['email']);
                        $username = mysqli_real_escape_string($conn,$_POST['username']);
                        $password = mysqli_real_escape_string($conn,$_POST['password']);

            $qry = "INSERT INTO `admin`(`email`, `username`, `password`,`img`) VALUES ('$email','$username','$password','$filename')";

            $res = mysqli_query($conn,$qry);
           

                            if($res){
                                header('Location: Login.php');
                            }else{
                                echo 'ERROR: '.mysqli_error($conn);
                            }
                }
  ?>