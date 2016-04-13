<html>
<head>
    <meta charset="UTF-8">
<title>Se connecter</title>
</head>
<body>
<h1>Se connecter</h1>
<form method="post" action="" name="lulu">
    <input type="text" placeholder="Votre login" name="lelogin" required /><br/>
    <input type='password' placeholder="Votre mot de passe" name="lepass" required /><br/>
    <input type="submit" value="se connecter" /><br/>
    <?php
    if(isset($erreur)) echo "<h3>$erreur</h3>";
?>
</form>
</body>
</html>
