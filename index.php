<?php
if ($handle = opendir('/downdir')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
            echo("<a href=\"pscripts/download.php?fl=$entry\">$entry</a></br>");
        }
    }
    closedir($handle);
}

if(isset($_GET['msg'])){
  echo("<script>if(confirm('".$_GET['msg']."')){ window.location.replace(\"index.php\"); } else { { window.location.replace(\"index.php\"); } }</script>");
}
?>

<html>

<head>
    <title>fwManager</title>
    <link rel="stylesheet" type="text/css" href="src/css/index.css">

    <script type="text/javascript">
    function getfolder(e) {
        var files = e.target.files;
        var path = files[0].webkitRelativePath;
        var Folder = path.split("/");
        ft = document.getElementById("uflForm");
        ft.value = Folder[0];
    }
    </script>
</head>

<body>
    <div id="bar_blank">
        <div id="bar_color"></div>
    </div>
    <div id="status"></div>

    <form action="pscripts/upload.php" method="POST" id="uofForm" enctype="multipart/form-data" target="hidden_iframe">
        <input type="hidden" name="ut" value="file" />
        <input type="hidden" value="uofForm" name="<?php echo ini_get("session.upload_progress.name"); ?>">
        <input type="file" name="fileToUpload" id="fileToUpload"></br>
        <input type="submit" value="Upload" name="submit">
    </form>

    <form action="pscripts/upload.php" method="post" enctype="multipart/form-data" target="hidden_iframe">
        <input type="hidden" name="ut" value="folder" />
        <input type="hidden" name="foldername" id="uflForm" />
        <input type="file" name="files[]" id="files" onchange="getfolder(event)" webkitdirectory mozdirectory
            msdirectory odirectory directory multiple /></br>
        <input type="Submit" value="Upload" name="upload" />
    </form>

    <iframe id="hidden_iframe" name="hidden_iframe" src="about:blank"></iframe>
    <script type="text/javascript" src="src/scripts/upload_bar.js"></script>
</body>
</html>