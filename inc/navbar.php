
<nav class="navbar navbar-expand-lg navbar-dark bg-primary danger">
  <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">APP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link"  href="<?php echo ROOT_URL; ?>">Home </a>
      </li>
      <li class="nav-item"> 
        <a class="nav-link" href="Profile.php">Profile</a>
      </li>
      <li class="nav-item"> 
        <a class="nav-link"  href="<?php echo ROOT_URL;?>addPost.php">Add Post</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action ="search.php">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search" >
      <button class="btn btn-secondary my-2 my-sm-0"  type="submit"> Search by Name </button>
    </form>
  </div>
</nav>


