<?php require "includes/header.php"; ?>
<?php  

$errors = [];

if (!empty($_POST)) {
    if (isset($_POST['Email'])) {
        $email = $_POST['Email'];
    } else {
        $email = "";
    }

    if (isset($_POST['mdp'])) {
        $mdp = $_POST['mdp'];
    } else {
        $mdp = "";
    }

    if (isset($_POST['Nom'])) {
        $nom = $_POST['Nom'];
    } else {
        $nom = "";
    }

    if (isset($_POST['Prenom'])) {
        $prenom = $_POST['Prenom'];
    } else {
        $prenom = "";
    }
    $hash = password_hash($mdp,
    PASSWORD_DEFAULT);

    if (!empty($email) && !empty($mdp) && !empty($nom) && !empty($prenom)) {
        $preparedStatement = $pdo->prepare("INSERT INTO Compte(Email,mdp,Nom,Prenom) VALUES(:email,:password,:surname,:name)");
        $preparedStatement->execute([
            ":email" => $email,
            ":password" => $hash,
            ":surname" => $nom,
            ":name" => $prenom
        ]);
        header("Location: index.php");
    } else {
        $errors[] = '<font color="red">Attention, Aucun champs ne doit être vide!</font>';
    }
}
?>

<h1>Page d'inscription</h1>
<form action="inscription.php" method="post">
    <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <?= $error ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <p>
        Veuillez entrer votre Email
        <br></br>
        <input type="text" name="Email" placeholder="Email" />
        <br></br>
        Veuillez entrer votre mot de passe
        <br></br>
        <input type="password" name="mdp" placeholder="Mot de passe" />
        <br></br>
        Veuillez entrer votre Nom
        <br></br>
        <input type="text" name="Nom" placeholder="Nom" />
        <br></br>
        Veuillez entrer votre Prenom
        <br></br>
        <input type="text" name="Prenom" placeholder="Prenom" />
        <br></br>
        <input type="submit" value="S'inscrire" />
    </p>
</form>
<?php require "includes/footer.php"; ?>