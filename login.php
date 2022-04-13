<?php require "includes/header.php"; ?>
<?php
$errors = [];
if (
    isset($_POST['password'])
    && isset($_POST['email'])
    && !empty($_POST['password'])
    && !empty($_POST['email'])
) {
    $email = $_POST['email'];
    $mdp = $_POST['password'];

    $req = $pdo->prepare('SELECT email, mdp FROM compte WHERE Email = :email');
    $req->execute(['email' => $email]);
    $resultat = $req->fetch();
    if (!$resultat) {;
        $errors[] =  '<font color="red">Mauvais identifiant ou mot de passe !</font>';
    } else {
        $isPasswordCorrect = password_verify($mdp, $resultat['mdp']);
        if ($isPasswordCorrect) {
            var_dump($resultat);
            $_SESSION['email'] = $resultat['Email'];
            header("Location: index.php?connexion_reussi");
        } else {
            $errors[] = '<font color="red">Mauvais identifiant ou mot de passe !</font>';
        }
    }
    } else {
        $errors[] = '<font color="red">Attention, Aucun champs ne doit être vide!</font>';
}
?>
<h1>Page de connexion</h1>
<form method="post" action="login.php">
    <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <?= $error ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <p>
        Veuillez entrer votre Email
        <br></br>
        <input type="text" name="email" placeholder="Email" />
        <br></br>
        Veuillez entrer votre mot de passe
        <br></br>
        <input type="password" name="password" placeholder="Mot de passe" />
        <br></br>
        <input type="submit" value="Connexion" />
    </p>
</form>
<?php require "includes/footer.php"; ?>