<?php
include_once("../core/init.php");
if(isset($_SESSION['adminid'])){
 $TotalStudents = $getFromA->TotalStudents();
 $TotalTeachers = $getFromA->TotalTeachers();
 $quote = $getFromA->quote();
}else{
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ptu BuddY - Admin Pannel</title>
  <?php include_once("includes/adminFrontHeader.php");?>
</head>
<body>
<?php include_once("includes/header.php");?>
<div class="container-fluid" style="max-width:1400px; margin-top: 20px;">
 <div class="row">
    <div class="col-md-4 mb-5 buddy-card align-self-center">
         <div style="width: 100%;" class="card bg-warning text-white" style="max-width:250px;">
             <div class="card-header">
               <h6 class="text-uppercase text-center"><a class="text-white" href="#">teachers</a></h6>
             </div>
             <div class="card-body">
               <h1 class="text-uppercase text-center"><?php echo $TotalTeachers;?></h1>
             </div>
          </div>
    </div>
    <div class="col-md-4 mb-5 buddy-card">
       <div style="width: 100%;" class="card bg-success text-white" style="max-width:250px;">
             <div class="card-header">
               <h6 class="text-uppercase text-center"><a class="text-white" href="#">online</a></h6>
             </div>
             <div class="card-body">
               <h1 class="text-uppercase text-center">2000</h1>
             </div>
          </div>
    </div>
    <div class="col-md-4 buddy-card">
          <div style="width: 100%;" class="card bg-dark text-white" style="max-width:250px;">
             <div class="card-header bg-dark text-white">
               <h6 class="text-uppercase text-center"><a class="text-white" href="#">students</a></h6>
             </div>
             <div class="card-body">
               <h1 class="text-uppercase text-center"><?php echo $TotalStudents;?></h1>
             </div>
          </div>
    </div>
</div><br><br>

  <div class="modal" id="buddyQuote">
    <div class="modal-dialog" style="max-width: 600px;">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Quote of the day</h4>
          <button type="button" class="btn btn-danger" data-dismiss="modal">&times;&nbsp;Close</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form method="POST" action="includes/editquote.php">
            <div class="form-group">
                <h3><?php echo $quote['quote'];?></h3>
                <textarea class="form-control" id="message" name="edit" placeholder="Type your new quote here" rows="3" style="resize: none; font-size: 25px;"></textarea><br>
                <button class="btn btn-primary btn-block" name="post_update">Update post</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

   <div class="modal" id="buddyTeacher">
    <div class="modal-dialog" style="max-width: 600px;">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">Add a Teacher</h3>
          <button type="button" class="btn btn-danger" data-dismiss="modal">&times;&nbsp;Close</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="includes/add_teacher.php">
                <div class="form-group">
                   <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                </div>
                <div class="form-group">
                   <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
                </div>
                <div class="form-group">
                   <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                   <input type="text" class="form-control" name="phone" placeholder="Phone number" required>
                </div>
                <div class="form-group">
                   <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                   <button class="btn btn-success" name="addtech">Add</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="buddyPost">
    <div class="modal-dialog" style="max-width: 600px;">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create your Post</h4>
          <button type="button" class="btn btn-danger" data-dismiss="modal">&times;&nbsp;Close</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div class="col">
              <div class="card gedf-card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Create your post</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                              <form method="post" action="includes/createPost.php">
                                <div class="form-group">
                                    <textarea class="form-control post_content" id="message" name="post_area" rows="5" placeholder="What are you thinking?" style="resize: none;" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <button type="submit" name="post_submit" class="btn btn-primary">Post</button>
                            </div>
                        </div>
                      </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
          <div class="d-inline-flex">
            <div class="form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buddyQuote"><i class="fas fa-pencil-alt"></i>&nbsp;Post Quote</button>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;
             <div class="form-group">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#buddyTeacher"><i class="fas fa-plus-circle"></i>&nbsp;Add Teacher</button>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="form-group">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#buddyPost"><i class="fas fa-pen-fancy"></i>&nbsp;Create a Post</button>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</body>
<script>
  $(document).ready(function() {
    $(".post_content").emojioneArea({
        pickerPosition:"bottom"
    });
  });
</script>
</html>


