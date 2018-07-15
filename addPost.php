<?php 
session_start();

    require ('config/db.php');
    require ('config/config.php');
  
    //check for submit

    
    if(isset($_POST['submit'])){

       
        //Get Form data

        $filename = $_FILES['image']['name'];
        $tmp_filename = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_filename,"Images/$filename"); 
        

        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $body = mysqli_real_escape_string($conn,$_POST['body']);
        $author = mysqli_real_escape_string($conn,$_POST['author']);
       
        $query = "INSERT INTO posts(title,author,body,img) VALUES('$title','$author','$body','$filename') ";
        
        if(mysqli_query($conn,$query)){
            header('Location: '.ROOT_URL.'');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }
    }
?>
   <?php include('inc/header.php'); ?>
            <div class='container'>
                <h1>  
                  Add Posts
                </h1>
                   <Form method='POST' action='<?php $_SERVER['PHP_SELF'];  ?>' enctype="multipart/form-data">
                
                  <div class='form-group'>
                      <label>Title</label>
                        <input type='text' name='title' class='form-control'  >
                    </div>
                    <div class='form-group'>
                        <input type='hidden'  name='author' class='form-control' value='<?php echo $_SESSION['Uname'] ?>'  >
                    </div>
                    <div class='form-group'>
                      <label>Body</label>
                        <textarea  name='body' class='form-control'  ></textarea>
                    </div>
                
                    <input type='submit' name='submit' value='submit' class="btn btn-primary">
                    <br>

                      <small>Select image to upload:</small>
                    <input type="file" name="image" id="fileToUpload">
                                        
                </Form>
                          
                                      
                     
                </div>
    <?php include('inc/footer.php'); ?>



