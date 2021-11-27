<?php 
echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="admin_profile.php"><img src="../assets/images/logo.png" alt="Logo" style="width:60px;">Ptu BuddY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav text-uppercase ">
      <li class="nav-item">
        <a class="nav-link" href="admin_post.php"><i class="fas fa-pen"></i>&nbsp;posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-tools"></i>&nbsp;settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-sticky-note"></i>&nbsp;notes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="includes/Adminlogout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;logout</a>
      </li>    
    </ul>
  </div>  
</nav>';
?>