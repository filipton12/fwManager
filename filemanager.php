<?php
if(!isset($_GET['path']))
{
    header("Location:./filemanager.php?path=/");
}
else
{
    $path = $_GET['path'];
    if(!endsWith($path, "/")){
        $path = $path."/";
        header("Location:./filemanager.php?path=$path");
    }
}

if ($handle = opendir('/downdir'.$path)) 
{
    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") 
        {
            if(is_dir('/downdir'.$path.$entry))
            {
                $path2 = $path.$entry.'/';
                echo("<a style=\"color:red;\" href=\"filemanager.php?path=$path2\">$entry</a></br>");
            }
            else
            {
                $path2 = $path.$entry;
                echo("<a href=\"pscripts/download.php?fl=$path2\">$entry</a></br>");
            }
        }
    }
    closedir($handle);
}

function endsWith($haystack, $needle) {
    return substr_compare($haystack, $needle, -strlen($needle)) === 0;
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