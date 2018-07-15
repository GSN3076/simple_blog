

    <?php 
            session_start();

            require ('config/db.php');
            require ('config/config.php');

            $searchquery = $_GET['search'];

          $squery=   'SELECT `id`, `title`, `body`, `author`, `created_at`, `img` FROM `posts` WHERE 1';

//Get result

$result = mysqli_query($conn,$squery);

//fetch data
$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

//close connection
mysqli_close($conn);
?>



<?php 
include('inc/header.php'); ?>
        <div class='container' >
                    <h2>Hello <?php echo $_SESSION['Uname']; ?></h2>
                    <a style="float:Right" class="btn btn-primary" href="LogOut.php">Logout</a>
            <h1>  
                Posts
            </h1>

                

               

                <?php foreach($posts as $post) : ?>
              
                <?php    if( $post['author'] === $searchquery ){ ?>

              
                <div class='jumbotron'>
                        <h3><?php echo $post['title']; ?></h3>
                        <small>Created on <?php echo $post['created_at']; ?> </small>

                        <blockquote class="blockquote">
                        <p class="mb-0"><?php echo $post['body']; ?></p>
                        <footer class="blockquote-footer">by <cite title="Source Title"><h6><?php echo $post['author'] ?><h6></cite></footer>
                        </blockquote>

                   
                   <div class="card text-white" style="max-width: 60rem;max-height: 60rem">
                        <img style="height: 100%; width: 100%; display: block;"  src='Images/<?php echo $post['img'] ?>' alt="">
                         </div>   
                        <a class='btn btn-default' href='<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>'>
                        Read More
                    </a>
                    </div>
                <?php } ?>
                <?php  
             endforeach;
                ?>


                
            </div>

        



        
<?php include('inc/footer.php'); ?>