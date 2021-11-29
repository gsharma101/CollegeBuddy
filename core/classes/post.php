<?php
class Post extends User
{

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function  posts($user_id ,$num)
    {
        $query = "SELECT * FROM posts,buddy_admin WHERE posted_by=admin_id ORDER BY post_id DESC LIMIT :num";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':num',$num,PDO::PARAM_INT);
        $stmt->execute();
        $posts  = $stmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($posts as $post) {
            $likes  = $this->likes($user_id, $post->post_id);
            $comments = $this->comments($post->post_id);
            echo '<div class="card gedf-card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-2">
                            <img class="rounded-circle" width="45" src="assets/images/dp.png" alt="profile">
                        </div>
                        <div class="ml-2">
                            <div class="h5 m-0">' . ucfirst($post->name) . '</div>
                            <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>&nbsp;'.$this->TimeAgo($post->posted_on) . '</div>
                        </div>
                    </div>
                    <div>
                    '.(($post->posted_by === $user_id) ? '<div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>' : '').'
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text" style="font-size:22px;">
                    ' . $post->body . '
                </p>
            </div>
            <div class="card-footer">
            <span>' . (($likes['like_on'] === $post->post_id) ? '<button style="font-size:23px; border:none; outline:none;" data-user="' . $post->posted_by . '" data-post="' . $post->post_id . '"  class="btn btn-unlike text-dark"><i class="fa fa-heart text-danger"></i>&nbsp;<span class="btn-like-counter">' . $post->likeCount . '</span></button>' : '<button style="font-size:23px; border:none; outline:none;" data-user="' . $post->posted_by . '" data-post="' . $post->post_id . '"  class="btn btn-like"><i class="fa fa-heart-o text-danger"></i>&nbsp;<span class="btn-like-counter">' . (($post->likeCount > 0) ? $post->likeCount : '') . '</span></button>') . '</span>
            <button class="btn btn-comment text-dark" data-toggle="modal" data-target="#displayComments" data-post="'.$post->post_id.'" style="font-size:23px; border:none; outline:none;"><i class="fa fa-comment-o"></i>&nbsp;<span></span></button>
            <button style="font-size:23px; border:none; outline:none;" class="btn text-dark"><i class="fa fa-share"></i>
            </div>
      </div><br>';
        }
    }

    public function likes($user_id, $post_id)
    {
        $query = "SELECT * FROM likes  WHERE like_by = :user_id AND like_on=:post_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addlike($user_id, $postid, $getid)
    {
        $query = "UPDATE posts SET  11111 = likeCount +1 WHERE post_id=:post_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':post_id', $postid, PDO::PARAM_INT);
        $stmt->execute();
        //inserting in likes
        $Sqlquery = "INSERT INTO likes (like_by,like_on) VALUES (:like_by,:like_on)";
        $stmt = $this->conn->prepare($Sqlquery);
        $stmt->bindParam(':like_by', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':like_on', $postid, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function dislike($user_id, $postid, $getid)
    {
        $query = "UPDATE posts SET likeCount = likeCount -1 WHERE post_id=:post_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':post_id', $postid, PDO::PARAM_INT);
        $stmt->execute();
        //deleting from likes
        $Sqlquery = "DELETE FROM likes WHERE like_by=:like_by AND like_on=:like_on";
        $stmt = $this->conn->prepare($Sqlquery);
        $stmt->bindParam(':like_by', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':like_on', $postid, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function comments($post_id)
    {
        $query = "SELECT * from comments LEFT JOIN student_info ON comment_by = user_id WHERE comment_on = :post_id ORDER BY comment_id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPopupTweet($post_id){
		$query = "SELECT * FROM posts , student_info WHERE post_id=:post_id AND posted_by=user_id";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':post_id',$post_id,PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}


    public function quote()
    {
        $query = "SELECT quote from buddy_quote";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
