<?php
if (isset($_POST['submit']))
{
    $link = mysqli_connect("localhost", "root", "password");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $sql = "CREATE DATABASE thegoodwine";
    if(mysqli_query($link, $sql)){
        echo "Database created successfully <br>";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link)."<br>";
    }
    $link = mysqli_connect("localhost", "root", "password", "thegoodwine");
    $sql = file_get_contents("thegoodwine.sql");
    $sql_array = explode(";", $sql);
    foreach ($sql_array as $val)
    {
        mysqli_query($link, $val);
    }
}
?>
<form action="install.php" method="post">
	<input type="submit" name="submit" id="" value="Install Database" />
</form>
