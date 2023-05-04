const usersBtn = document.getElementById('users');
const booksBtn = document.getElementById('books');
const userForm = document.getElementById('get_user_form');
const userInput = document.getElementById('user_input');
const bookForm = document.getElementById('get_book_form');
const bookInput = document.getElementById('book_input');
const contentDiv = document.getElementById('content');

usersBtn.addEventListener('click', async () => {
    const request = await fetch('/super-week/users');
    const users = await request.json();
    contentDiv.innerHTML = "";
    for (user of users) {
        console.log(user);
        contentDiv.innerHTML += (
            `<div class="user">
                <h3>User : ${user.first_name} ${user.last_name} </h3>
                Email : ${user.email}
            </div>`
            );
    }
})

booksBtn.addEventListener('click', async () => {
    const request = await fetch('/super-week/books');
    const books = await request.json();
    contentDiv.innerHTML = "";
    for (book of books) {
        console.log(book);
        contentDiv.innerHTML += (
            `<div class="book">
                <h3>Titre : ${book.title}</h3>
            </div>`
            );
    }
})

userForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const idUser = userInput.value;
    const request = await fetch('/super-week/users/' + idUser);
    const user = await request.json();
    console.log(user);
    contentDiv.innerHTML = (
        `<h3>User : ${user.first_name} ${user.last_name} </h3>
        Id : ${user.id}
        Email : ${user.email}`
        );
})

bookForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const idBook = bookInput.value;
    const request = await fetch('/super-week/books/' + idBook);
    const book = await request.json();
    console.log(book);
    contentDiv.innerHTML = (
        `<h3>Book : ${book.title}</h3>
        Id : ${book.id}
        <p>Content : ${book.content}</p>`
        );
})