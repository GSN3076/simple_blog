<?php 
session_start();

    require ('config/db.php');
    require ('config/config.php');
  
    //check for submit

    if(isset($_POST['submit'])){
        //Get Form data
        $update_id = mysqli_real_escape_string($conn,$_POST['update_id']);
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $body = mysqli_real_escape_string($conn,$_POST['body']);
        $author = mysqli_real_escape_string($conn,$_POST['author']);

        $query = "UPDATE posts SET
                title='$title',
                author='$author',
                body='$body'
               WHERE id= {$update_id} 
        ";

        if(mysqli_query($conn,$query)){
            header('Location: '.ROOT_URL.'');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }
    }

       //getId
       $id=mysqli_real_escape_string($conn,$_GET['id']);


       $query ='SELECT * FROM posts WHERE id ='.$id   ;
   
       //Get result
   
       $result = mysqli_query($conn,$query);
   
       //fetch data
       $post = mysqli_fetch_assoc($result);
   
       mysqli_free_result($result);
       
       //close connection
       mysqli_close($conn);
?>
   <?php include('inc/header.php'); ?>
            <div class='container'>
                <h1>  
                  Edit Posts
                </h1>
                   <Form method='POST' action='<?php $_SERVER['PHP_SELF'];  ?>' >
                
                  <div class='form-group'>
                      <label>Title</label>
                        <input type='text' name='title' value='<?php echo $post['title']; ?>' class='form-control'  >
                    </div>
                    <div class='form-group'>
                        <input type='hidden'  name='author' class='form-control' value='<?php echo $_SESSION['Uname'] ?>'  >
                    </div>
                    <div class='form-group'>
                      <label>Body</label>
                        <textarea  name='body'  class='form-control'  > <?php echo $post['body']; ?></textarea>
                    </div>
                    <input type=hidden  name='update_id' value = '<?php echo $post['id'] ?>'>
                    <input type='submit' name='submit' value='submit' class="btn btn-primary">
                </Form>
                </div>
    <?php include('inc/footer.php'); ?>



