<?php
include_once('core/init.php');
$user_id = @$_SESSION['userid'];
$user = $getFromU->UserData($user_id);
$quote = $getFromP->quote();
if ($getFromU->loggedIn() === false) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Campus Ecosystem</title>
    <?php include_once("includes/backHeader.php"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.css">
    <script src="https://kit.fontawesome.com/1b8b2eefd1.js" crossorigin="anonymous"></script>
    <script src="assets/js/sidenav.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include_once("includes/profileNevigation.php"); ?>
    <?php include_once("includes/SideNav.php"); ?>
    <div class="container-fluid gedf-wrapper" style="margin-top:5rem;">
        <div class="row ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="h5"><a
                                href="profile"><?php echo ucfirst($user->fname) . " " . ucfirst($user->lname); ?></a>
                        </div>
                        <img class="card-img-top" style="width:150px;" src="<?php echo $user->profile_image; ?>"
                            alt="Card image">
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="h6 text-muted">General Information</div>
                            <div class="h5 text-uppercase"><?php echo strtoupper($user->branch) . " " . $user->sem; ?>
                                Semester</div>
                            <div class="h5 text-uppercase text-muted"><?php echo $user->uni_roll; ?></div>
                        </li>
                        <li class="list-group-item bg-dark text-white text-center">
                            <a class="text-white" href="https://www.facebook.com/ptubuddy/" target="_blank"><i
                                    class="fa fa-facebook"></i>&nbsp;facebook</a>&nbsp;
                            <a><i class="fa fa-whatsapp"></i>&nbsp;whatsapp</a>
                            <a></a>
                        </li>
                    </ul>
                </div><br>
                <div class="card">
                    <div class="card-header text-center text-uppercase">
                        <h5>clipboard</h5>
                    </div>
                    <div class="card-body text-center">
                        <ul class="list-group">
                            <button type="button" data-toggle="modal" data-target="#studentsNotes"
                                class="list-group-item bg-primary text-uppercase text-white">notes</button>
                        </ul>
                    </div>
                </div><br>
            </div>
            <div class="col-md-6 gedf-main buddy-quote" style="margin-bottom: 20px;">
                <div class="card gedf-card">
                    <div class="card gedf-card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="text-uppercase text-center">quote of the day</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center" style="font-size: 20px; font-weight: bold; font-family:buddy_quote;">
                                <?php echo $quote->quote; ?></p>
                        </div>
                    </div>
                </div><br>
                <!--XXXXXXXXXXXXXXXXX-POST-XXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
                <div class="posts" style="width:100%;">
                    <?php $getFromP->posts($user_id, 3); ?>
                    <div class="btn loading-div">
                        <span class="spinner-grow spinner-grow-sm"></span>
                        Loading posts..
                    </div>
                </div>
                <script src="assets/js/fetch.js" crossorigin="anonymous"></script>
                <script src="assets/js/like.js" crossorigin="anonymous"></script>
                <!--XXXXXXXXXXXXXXXXXX-COMMENTS-XXXXXXXXXXXXXXXXXXXXXXXXXXX-->
                <div class="modal" id="displayComments">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Comments</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div style="overflow-y: auto; max-height:530px;" class="contaier modal-body comments">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="assets/js/comment.js" crossorigin="anonymous"></script>
            <script src="assets/js/postComment.js" crossorigin="anonymous"></script>
            <script src="assets/js/commentDelete.js" crossorigin="anonymous"></script>
            <!--XXXXXXXXXXXXXXXXXX-ALERTS-XXXXXXXXXXXXXXXXXXXXXXXXXXX-->
            <div class="col-md-3 buddy-alert">
                <div class="card gedf-card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Important</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Holidays</h6>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in justo ac
                            lectus suscipit iaculis. </p>
                        <a href="#" class="card-link">Read Full</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="studentsNotes">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-uppercase badge badge-warning">
                            <?php echo strtoupper($user->branch) . " " . $user->sem; ?> semester notes</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div style="overflow-y: auto; max-height:530px;" class="contaier modal-body studentsNotes">

                    </div>
                    <script src="assets/js/notes.js"></script>
                    <div class="modal-footer text-center">
                        <h6>Powered by <a href="https://www.cgc.edu.in/" target="_blank">CGC LANDRAN</a></h6>
                    </div>
                </div>
            </div>
        </div>
        <div id="filelistModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title btn bg-danger text-white text-uppercase">notes list</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="file_list"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js"></script>

</html>