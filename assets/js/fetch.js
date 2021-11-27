$(document).ready(function(){
    var win = $(window);
    var offset = 3;

    win.scroll(function(){
        if(win.scrollTop() == $(document).height() - win.height()){
            offset +=3;
            $('.loading-div').show();
            $.post('core/ajax/fetchPost.php',{fetchPost:offset},function(data){
                $('.posts').html(data);
                $('.loading-div').hide();
            });
        }
    });
});