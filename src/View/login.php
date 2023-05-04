<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="src/View/style/style.css">
</head>
<body>

    <h1>Login</h1>

    <?php if (isset($_COOKIE['connection'])) : ?>
        <?php if ($_COOKIE['connection'] === "failed") : ?>
            <p><?=  "the connection failed !" ?></p>
        <?php endif ?>
    <?php endif ?>

    <form action="login" method="POST">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>