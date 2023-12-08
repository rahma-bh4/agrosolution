<?php
$mysqli = new mysqli("localhost", "root", "", "agrosolutions");

$soil = $mysqli->real_escape_string($_POST['soil']);
$hum = $mysqli->real_escape_string($_POST['hum']);
$reg = $mysqli->real_escape_string($_POST['region']);

if ($region='Nabeul' and $hum='50%'){
    $page1 = "suggestion1.html";
    header("Location: $page1");
    exit;
}

if ($region='Nabeul' and $hum='25%') {
    $page2 = "suggestion2.html";
    header("Location: $page2");
    exit;
}
?>
