<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="src/View/scripts/script.js" defer></script>
    <link rel="stylesheet" href="src/View/style/style.css">
</head>

<body>
    <header>
        <h1>Welcome <?= isset($_SESSION['user']) ? $_SESSION['user']['first_name'] : null ?></h1>
        <?php if (!isset($_SESSION['user'])) : ?>
            <button id="sign_in">Sign in</button>
            <button id="sign_up">Sign up</button>
        <?php else : ?>
            <button id="disconnect">Disconnect</button>
            <button id="add_book">Add book</button>
        <?php endif ?>
    </header>

    <div id="buttons_div">
        <h2>Informations</h2>
        <input type="button" value="Users" id="users">
        <input type="button" value="Books" id="books">
        <form action="" id="get_user_form">
            <input type="number" name="user" id="user_input">
            <input type="submit" value="get user">
        </form>
        <form action="" id="get_book_form">
            <input type="number" name="book" id="book_input">
            <input type="submit" value="get book">
        </form>
        <h2>DataBase</h2>
        <input type="button" value="Generate 10 users" id="generate_users">
        <input type="button" value="Generate 10 books" id="generate_books">
        <input type="button" value="Reset users" id="delete_users">
        <input type="button" value="Reset books" id="delete_books">
    </div>
    <hr>
    <div id="content"></div>
</body>

</html>