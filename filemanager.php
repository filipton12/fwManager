<?php
include 'global.php';

if(!isset($_GET['path']))
{
    header("Location:./filemanager.php?path=/");
}
else
{
    $path = $_GET['path'];
    $path = str_replace("..", "", $path);
    if(!endsWith($path, "/")){
        $path = $path."/";
        header("Location:./filemanager.php?path=$path");
    }
    if(!startsWith($path, "/")){
        $path = "/".$path;
        header("Location:./filemanager.php?path=$path");
    }

    $replacedpath = str_replace("//", "/", $path);
    if($path != $replacedpath)
    {
        header("Location:./filemanager.php?path=$replacedpath");
    }
}

$dirar = array_filter(explode('/', $path));
$previous = str_replace($dirar[count($dirar)]."/", "", $path);

if($previous != NULL)
{
    echo("<a style=\"color:#ff0000;\" href=\"filemanager.php?path=$previous\">..</a></br>");
}

$rawfiles = scandir('/downdir'.$path);
$files = array();

foreach ($rawfiles as $file) {
    if ($file != '.' && $file != '..') {
        if(is_dir('/downdir'.$path.$file)){
            $path2 = $path.$file.'/';
            echo("<a style=\"color:#00FF3E;\" href=\"filemanager.php?path=$path2\">$file</a></br>");
        }
        else{
            $files[] = $file;
        }
    }
}
foreach($files as $file){
    $path2 = $path.$file;
    echo("<a href=\"pscripts/download.php?fl=$path2\">$file</a></br>");
}

function endsWith($haystack, $needle) {
    return substr_compare($haystack, $needle, -strlen($needle)) === 0;
}
function startsWith($haystack, $needle) {
    return substr_compare($haystack, $needle, 0, strlen($needle)) === 0;
}
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
</head>
</html>