<?php
$mysqli = new mysqli("localhost", "root", "", "agrosolutions");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$mail = $mysqli->real_escape_string($_POST['email']);
$mdp = $mysqli->real_escape_string($_POST['mdp']);

$req1 = "SELECT * FROM client WHERE email='$mail' AND mdp='$mdp'";
$result = $mysqli->query($req1);
$res1 = $result->num_rows;

if ($res1 == 0) {
    echo "Verifier votre email/mot de passe";
} else {
    $soil = $mysqli->real_escape_string($_POST['soil']);
    $hum = $mysqli->real_escape_string($_POST['hum']);

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
}

$mysqli->close();
?>

