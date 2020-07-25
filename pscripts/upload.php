<?php
if($_POST['ut'] == "file")
{
  $target_dir = "/downdir/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $uploadOk = 1;
  
  if(isset($_POST["submit"])) {
      if (file_exists($target_file)) 
      {
        $uploadOk = 0;
      }
  }
  
  if ($uploadOk == 0) {}
  else 
  {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {}
  }
}
else if($_POST['ut'] == "folder")
{
  if($_POST['foldername'] != "")
  {
  	$foldername=$_POST['foldername'];
    if(!is_dir($foldername)) 
    {
      mkdir("/downdir/".$foldername);
      chmod("/downdir/".$foldername, 0777);
    }
 		foreach($_FILES['files']['name'] as $i => $name)
	  {
 		  if(strlen($_FILES['files']['name'][$i]) > 1)
 		  {  
        move_uploaded_file($_FILES['files']['tmp_name'][$i],"/downdir/".$foldername."/".$name);
 		  }
 		}
  }
}
else if($_POST['ut'] == "files")
{
  foreach($_FILES['files']['name'] as $i => $name)
	{
 	  if(strlen($_FILES['files']['name'][$i]) > 1)
 		{  
      move_uploaded_file($_FILES['files']['tmp_name'][$i],"/downdir/".$name);
 		}
 	}
}
?>