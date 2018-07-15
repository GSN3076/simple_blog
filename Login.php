<?php 
session_start();
    if(isset($_SESSION["Uname"])){
        echo "You are allready LoggedIn";
        header('location:index.php');
        exit();
    }
    
?>
<?php include('inc/header.php'); ?>

    <div style="margin-top: 300px" class="container">
        <form align="center" class="form-control" method="post">
            <div>
                <label for="Username">Username</label>
                <input type="text" name="Username">
            </div>
            <div>
                <label for="Password">Password</label>
                <input type="text" name="Password">
            </div>
            <input class="btn-primary" type="submit">
        </form>
    </div>

  
    <?php include('inc/footer.php'); ?>
    <?php 

                   
                      $_SESSION["Uname"] = $_POST['Username'];        
                      
          ?>
