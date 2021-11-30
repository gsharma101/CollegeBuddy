<?php
echo '<div id="mySidenav" class="sidenav bg-dark">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <img src="'.$user->profile_image.'" style="width: 40%; margin-left: 18px; border-radius: 50%;">
        <a href="home.php"><i class="fas fa-home"></i>&nbsp;Home</a>
        <a href="profile"><i class="fas fa-user"></i>&nbsp;Profile</a>
        <a href="settings"><i class="fas fa-tools"></i>&nbsp;Settings</a>
        <a href="https://www.youtube.com/channel/UCBwt55ujaLmHtyI8nZ7vrzw" target="_blank" ><i class="fas fa-headphones-alt"></i>&nbsp;Audiobooks</a>
        <a class="text-danger" href="includes/LogoutScript.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
    </div>
';
?>