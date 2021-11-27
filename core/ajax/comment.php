<?php
include_once('../init.php');
$getFromU->preventAccess($_SERVER['REQUEST_METHOD'] ,realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));
if (isset($_POST['comment']) && !empty($_POST['comment'])) {
  $comment = $getFromU->InputValidate($_POST['comment']);
  $user_id = @$_SESSION['userid'];
  $post_id = $_POST['post_id'];
  if (!empty($comment)) {
    $getFromA->create('comments', array(
      'comment_body' => $comment,
      'comment_on' => $post_id, 'comment_by' => $user_id, 'comment_at' => date('d M Y h:ia')
    ));
    $comments = $getFromP->comments($post_id);
?>
<div class="conatiner">
      <div class="form-group">
        <textarea class="form-control comment-area" data-post="<?php echo $post_id; ?>" rows="5" cols="8" style="resize: none;" placeholder="Write a comment?"></textarea>
      </div>
      <div class="form-group">
        <button name="comment" class="btn m-3 btn-primary postComment" name="post_comment">Comment</button>
      </div>
    </div>
    <hr>
<?php
    foreach ($comments as $comment) {
      echo '<div class="media p-2">
            <img src="' . $comment->profile_image . '" alt="profile" class="mr-3 mt-3 rounded-square" style="width:50px;">
            <div class="media-body">
              <strong class="badge badge-primary">' . ucfirst($comment->fname) . ' ' . ucfirst($comment->lname) . '</strong> <small><i class="fa fa-clock-o">&nbsp;'.$getFromU->TimeAgo($comment->comment_at) . '</i></small>
              '.(($comment->comment_by === $user_id) ? '<div class="d-inline dropdown">
              <span class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </span>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                  <a class="dropdown-item comment-delete" data-post="'.$post_id.'" data-comment="'.$comment->comment_id.'" href="#"><i class="fas fa-trash"></i>&nbsp;Delete</a>
              </div>
          </div>' : '').'
              <p>' . $comment->comment_body . '</p>
            </div>
          </div>';
    }
  }
}
?>