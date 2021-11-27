$(document).ready(function () {
    load_folder_list();

    function load_folder_list() {
        var fetch = "fetchNotes";
        $.ajax({
            url: 'notes.php',
            method: 'POST',
            data: { fetch: fetch },
            success: function (data) {
                $('.studentsNotes').html(data);
            }
        });
    }

    $(document).on('click', '.view_files', function(){
        var folder_name = $(this).data("name");
        var action = "fetch_files";
        $.ajax({
         url:"notes.php",
         method:"POST",
         data:{action:action, folder_name:folder_name},
         success:function(data)
         {
          $('#file_list').html(data);
          $('#filelistModal').modal('show');
         }
        });
       });
});