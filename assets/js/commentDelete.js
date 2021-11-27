$(document).ready(function () {
    $(document).on('click', '.comment-delete', function () {
      var commentid = $(this).data('comment');
      var postid = $(this).data('post');
      data = {
          commentid : commentid
      }
      $.post('core/ajax/commentDelete.php', data , function(){
        $.post('core/ajax/commentPop.php', { postid: postid }, function (data){
            $('.comments').html(data);
          });
      });
    });
  });