<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="src/View/style/style.css">
</head>
<body>

    <h1>Register</h1>
    
    <form action="register" method="POST">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <label for="passwordConf">Password Confirmation</label>
        <input type="password" name="passwordConf" id="passwordConf">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" id="firstname">
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" id="lastname">
        <input type="submit" name="submit">
    </form>

</body>
</html>
