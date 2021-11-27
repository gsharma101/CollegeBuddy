$(document).ready(function () {
   $(document).on('click', '.btn-like', function () {
      var postid = $(this).data('post');
      var userid = $(this).data('user');
      var counter = $(this).find('.btn-like-counter');
      var btn = $(this);
      var count = counter.text();

      var data = {
         postid: postid,
         userid: userid
      }

      $.post('includes/like_script.php', data, function () {
         counter.show();
         btn.addClass('btn-unlike');
         btn.removeClass('btn-like');
         count++;
         counter.text(count);
         btn.find('.fa-heart-o').addClass('fa-heart');
         btn.find('.fa-heart').removeClass('fa-heart-o');
      });

   });

   $(document).on('click', '.btn-unlike', function () {
      var postid = $(this).data('post');
      var userid = $(this).data('user');
      var counter = $(this).find('.btn-like-counter');
      var btn = $(this);
      var count = counter.text();

      var data = {
         unlike: postid,
         userid: userid
      }

      $.post('includes/like_script.php', data, function () {
         counter.show();
         btn.addClass('btn-like');
         btn.removeClass('btn-unlike');
         count--;
         if (count === 0) {
            counter.hide();
         } else {
            counter.text(count);
         }
         btn.find('.fa-heart').addClass('fa-heart-o');
         btn.find('.fa-heart-o').removeClass('fa-heart');
      });

   });

});