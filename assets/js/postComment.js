$(document).ready(function(){
    $(document).on('click','.postComment',function(){
        var comment = $('.comment-area').val();
        var post_id = $('.comment-area').data('post');

        var data = {
            comment:comment,
            post_id:post_id
        }

        if(comment != ""){
            $.post('core/ajax/comment.php',data,function(data){
                $('.comments').html(data);s
            });
        }
    });
});