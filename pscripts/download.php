<?php
$fkey = $_GET['fk'];

if(isset($fkey))
{
    $servername = "localhost";
    $username = "test";
    $password = "test";
    $dbname = "fwManager";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `SharedFiles` WHERE fkey='$fkey'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if(isset($row["file"])){
            $file = '/downdir'.$row["file"];
            if(is_dir($file)){
                header("Location:../index.php?msg=ERROR: This file is folder!");
            }

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
        }
    }
    } else {
    echo "0 results";
    }
    $conn->close();
}
?>