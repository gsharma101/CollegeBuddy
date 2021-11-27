<?php
include_once('../core/init.php');
$teacher_id = @$_SESSION['teacher_id'];
$Tuser = $getFromT->TeacherData($teacher_id);
$quote = $getFromP->quote();
if ($getFromT->loggedInTeacher() === false) {
    header("Location: ../teacherlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ptu Buddy</title>
    <?php include_once("includes/TeacherbackHeader.php"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.css">
    <script src="https://kit.fontawesome.com/1b8b2eefd1.js" crossorigin="anonymous"></script>
    <script src="../assets/js/sidenav.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include_once("includes/profileNevigation.php"); ?>
    <?php include_once("../includes/SideNav.php"); ?>
    <div class="container-fluid gedf-wrapper" style="margin-top:5rem;">
        <div class="row ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="h5"><a href="profile"><?php echo ucfirst($Tuser->fname) . " " . ucfirst($Tuser->lname); ?></a></div>
                        <img class="card-img-top" style="width:150px;" src="<?php echo $Tuser->Tprofile; ?>" alt="Card image">
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                        </li>
                        <li class="list-group-item bg-dark text-white text-center">
                            <a class="text-white" href="https://www.facebook.com/ptubuddy/" target="_blank"><i class="fa fa-facebook"></i>&nbsp;facebook</a>&nbsp;
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
                            <button type="button" data-toggle="modal" data-target="#studentsNotes" class="list-group-item bg-primary text-uppercase text-white">Upload Notes</button>
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
                            <p class="text-center" style="font-size: 20px; font-weight: bold; font-family:buddy_quote;"><?php echo $quote->quote; ?></p>
                        </div>
                    </div>
                </div><br>
                <!--XXXXXXXXXXXXXXXXX-POST-XXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
                <div class="posts" style="width:100%;">

                </div>
                <script src="../assets/js/fetch.js" crossorigin="anonymous"></script>
                <script src="../assets/js/like.js" crossorigin="anonymous"></script>
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
            <script src="../assets/js/comment.js" crossorigin="anonymous"></script>
            <script src="../assets/js/postComment.js" crossorigin="anonymous"></script>
            <script src="../assets/js/commentDelete.js" crossorigin="anonymous"></script>
            <!--XXXXXXXXXXXXXXXXXX-ALERTS-XXXXXXXXXXXXXXXXXXXXXXXXXXX-->
            <div class="col-md-3 buddy-alert">
                <div class="card gedf-card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Important</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Holidays</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="card-link">Read Full</a>
                    </div>
                </div><br>
            </div>
        </div>
        <div class="modal" id="studentsNotes">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-uppercase badge badge-warning">Upload Notes</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div style="overflow-y: auto; max-height:530px;" class="contaier modal-body">
                        <form>
                            <div class="form-group">
                                <input type="file">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="File Name">
                            </div>
                            <div class="form-group">
                                <select name="branch" class="form-control" required>
                                    <option disabled selected>Branch</option>
                                    <option value="cse">CSE</option>
                                    <option value="me">ME</option>
                                    <option value="it">IT</option>
                                    <option value="ece">ECE</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="Semester" class="form-control" required>
                                    <option disabled selected>Semester</option>
                                    <option value="1">1 Semester</option>
                                    <option value="2">2 Semester</option>
                                    <option value="3">3 Semester</option>
                                    <option value="4">4 Semester</option>
                                    <option value="5">5 Semester</option>
                                    <option value="6">6 Semester</option>
                                    <option value="7">7 Semester</option>
                                    <option value="8">8 Semester</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="Subject" class="form-control" required>
                                    <option disabled selected>Subject</option>
                                    <option value="m1">Mathematics-1</option>
                                    <option value="physics">Semiconcuctor Physics</option>
                                    <option value="edg">Engineering Drawing and Graphic</option>
                                    <option value="bee">Basic Electronics and Engineering</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success"><i class="fas fa-upload"></i> Upload Notes</button>
                            </div>
                        </form>
                    </div>
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