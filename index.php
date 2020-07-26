<?php
include 'global.php';

if(isset($_GET['msg'])){
  echo("<script>if(confirm('".$_GET['msg']."')){ window.location.replace(\"index.php\"); } else { { window.location.replace(\"index.php\"); } }</script>");
}
?>

<html>
	<head>
		<title>fwManager</title>

		<link rel="stylesheet" type="text/css" href="src/css/index.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>

		<script type="text/javascript">
			function getfolder(e) {
			    var files = e.target.files;
			    var path = files[0].webkitRelativePath;
			    var Folder = path.split("/");
			    ft = document.getElementById("uflForms");
			    ft.value = Folder[0];
			} </script>
		<script type="text/javascript" src="src/scripts/upload_bar.js"></script>
	</head>
	<body>
		<div>
			<div class="progress" style="width: 300px;">
				<div id="upb" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
					aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
			</div>
			<div class="pbutton"><button type="button" class="btn btn-outline-danger" onclick="abort()">ABORT</button></div>
		</div>
		<br>
		<form id="upload_file_form" enctype="multipart/form-data" method="post">
			<input type="file" name="file" id="file"><br>
			<input type="button" value="Upload File" onclick="uploadFile('file')">
		</form>
		<form id="upload_folder_form" enctype="multipart/form-data" method="post">
			<input type="hidden" name="foldername" id="uflForms" />
			<input type="file" name="files[]" id="files" onchange="getfolder(event)" webkitdirectory mozdirectory
				msdirectory odirectory directory multiple /></br>
			<input type="button" value="Upload Folder"
				onclick="uploadFile('folder', document.getElementById('uflForms').value)">
		</form>
		<form id="upload_files_form" enctype="multipart/form-data" method="post">
			<input type="file" name="mfiles[]" id="mfiles" onchange="getfolder(event)" multiple /></br>
			<input type="button" value="Upload Files" onclick="uploadFile('files')">
		</form>
	</body>
</html>