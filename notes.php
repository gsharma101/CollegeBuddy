<?php
include_once('core/init.php');
$user_id = @$_SESSION['userid'];
$user = $getFromU->UserData($user_id);
if(isset($_POST['fetch']) || isset($_POST[$user_id])){
  if(isset($_POST['fetch']) == "fetchNotes"){
    $folder = $getFromU->notesDir($user->branch,$user->sem,$user_id);
    $output = '
    <table class="table text-dark text-uppercase table-bordered table-striped">
     <tr class="bg-dark text-white">
      <th>Subject</th>
      <th>Total File</th>
      <th>view notes</th>
     </tr>
     ';
    if(count($folder) > 0)
    {
     foreach($folder as $name)
     {
      $output .= '
       <tr>
        <td class="text-uppercase"><strong>'.$getFromU->dirNames('/',$name).'</strong></td>
        <td>'.(count(scandir($name)) - 2).'</td>
        <td><button type="button" name="view_files" data-name="'.$name.'" class="view_files btn btn-success btn-xs">View Files</button></td>
       </tr>';
     }
    }
    else
    {
     $output .= '
      <tr>
       <td class="text-center bg-danger text-white" colspan="12">NO NOTES ARE AVAILABLE</td>
      </tr>
     ';
    }
    $output .= '</table>';
    echo $output;
  }
}
if(isset($_POST["action"]) == "fetch_files")
 {
  $file_data = scandir($_POST["folder_name"]);
  $output = '
  <table class="table text-center table-bordered table-striped">
   <tr class="text-uppercase">
    <th>name</th>
    <th>view document</th>
    <th>download</th>
   </tr>
  ';
  
  foreach($file_data as $file)
  {
   if($file === '.' or $file === '..')
   {
    continue;
   }
   else
   {
    $path = $_POST["folder_name"] . '/' . $file;
    $output .= '
    <tr>
     <td data-folder_name="'.$_POST["folder_name"].'"  data-file_name = "'.$file.'" class="change_file_name btn btn-outline-primary text-uppercase">'.$getFromU->fileName($file).'</td>
     <td><button name="view_notes" class="btn view notesbtn  text-white text-uppercase btn-block btn-warning btn-xs" id="'.$path.'">view</button></td>
     <td><a name="download_file" href="'.$path.'" class="download_file text-uppercase btn btn-block btn-dark btn-xs" download>download</a></td>
    </tr>
    ';
   }
  }
  $output .='</table>';
  echo $output;
 }                     
?>