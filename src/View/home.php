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
    <h1>Home</h1>
    <div id="buttons_div">
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
    </div>
    <div id="content"></div>
</body>
</html>