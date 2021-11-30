<?php
include_once("../core/init.php");
if (isset($_SESSION['adminid'])) {
  $admin_id = $_SESSION['adminid'];
} else {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Pannel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://kit.fontawesome.com/1b8b2eefd1.js" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js"></script>
  <style type="text/css">
    @media screen and (max-width:900px) {
      .buddy-card {
        margin-bottom: 20px;
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <?php include_once("includes/header.php"); ?>
  <div class="container-fluid" style="max-width:1400px; margin-top: 20px;">
    <div class="row">
      <div class="col-sm-6">
        <form>
          <div class="card gedf-card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Edit your post</a>
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
    </form>
  </div>
  <div class="col-sm-6">
    <?php $getFromP->posts($admin_id,3); ?>
  </div>
  </div>
  </div>
</body>
<script type="text/javascript" src="../assets/js/like.js"></script>
<script type="text/javascript" src="../assets/js/comment.js"></script>
<script>
  $(document).ready(function() {
    $(".post_content").emojioneArea({
      pickerPosition: "bottom"
    });
  });
</script>

</html>