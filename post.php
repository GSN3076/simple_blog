<?php 

session_start();
if(isset($_SESSION["Uname"])){
      
}else{
    echo "You are not Logged  in";
    exit();
}
    
   require ('config/config.php');
    require ('config/db.php');


    
    if(isset($_POST['delete'])){
        //Get Form data
        $delete_id = mysqli_real_escape_string($conn,$_POST['delete_id']);
        $query = "DELETE FROM posts WHERE id ={$delete_id}";

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
  <?php include('inc/header.php')?>
    <body>
            <div class='container'>
                    <a href='<?php echo ROOT_URL; ?>' class='btn btn-default'  >Back</a>
                    <div class='jumbotron'>
                            <h1><?php echo $post['title']; ?></h1>
                            <small>Created on <?php echo $post['created_at']; ?>by <h5> <?php echo $post['author'] ?> </h5></small>
                            <p><?php echo $post['body']; ?></p> 
                            <div class="card text-white" style="max-width: 60rem;max-height: 60rem">
                                <img style="height: 100%; width: 100%; display: block;"  src='Images/<?php echo $post['img'] ?>' alt="">
                                 </div> 
                                </div>
                                </div>
                    <hr>    
                 

                            <?php  if($post['author'] === $_SESSION["Uname"]){ ?>
                       <Form class="pull-right" method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type='hidden' name='delete_id' value="<?php echo $post['id']; ?>" >
                            <input type='submit' name='delete' value="Delete" class='btn btn-danger' >
                             <a href ="<?php echo ROOT_URL;?>editpost.php?id=<?php echo $post['id']; ?> " class='btn btn-default'>Edit Post</a>
                        </Form>
                            <?php } ?>      
                  
                

                <?php include('inc/footer.php')?>



