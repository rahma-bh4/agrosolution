<?php
$c = mysqli_connect("localhost", "root", "", "agrosolutions");

if ($c->connect_error) {
    die("La connexion à la base de données a échoué : " . $c->connect_error);
}

$ncin = $c->real_escape_string($_POST['ncin']);
$nom = $c->real_escape_string($_POST['nom']);
$prenom = $c->real_escape_string($_POST['prenom']);
$email = $c->real_escape_string($_POST['email']);
$mpass = $c->real_escape_string($_POST['mpass']);
$mpassc = $c->real_escape_string($_POST['mpassc']);
$region = $c->real_escape_string($_POST['region']);

$query = "SELECT * FROM client WHERE email='$email' OR ncin='$ncin'";
$res = $c->query($query);

if ($res->num_rows > 0) {
    echo ("Les données existent déjà dans la base de données. Veuillez vérifier votre email et/ou votre NCIN.");
} else {
    $stmt = $c->prepare("INSERT INTO client (ncin, nom, prenom, region, email, mpass, mpassc) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $ncin, $nom, $prenom, $region, $email, $mpass, $mpassc);

    if ($stmt->execute()) {
        echo "Enregistrement réussi.";
    } else {
        echo "Erreur lors de l'enregistrement : " . $stmt->error;
    }

    $stmt->close();
}

$c->close();
?>

