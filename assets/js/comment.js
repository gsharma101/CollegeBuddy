$(document).ready(function () {
  $(".comment-area").emojioneArea({
    pickerPosition: "bottom"
  });
  $(document).on('click', '.btn-comment', function () {
    var postid = $(this).data('post');
    $.post('core/ajax/commentPop.php', { postid: postid }, function (data) {
      $('.comments').html(data);
    });
  });
});