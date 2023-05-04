const usersBtn = document.getElementById('users');
const booksBtn = document.getElementById('books');
const userForm = document.getElementById('get_user_form');
const userInput = document.getElementById('user_input');
const bookForm = document.getElementById('get_book_form');
const bookInput = document.getElementById('book_input');
const contentDiv = document.getElementById('content');
const generateUsersBtn = document.getElementById('generate_users');
const generateBooksBtn = document.getElementById('generate_books');
const deleteUsersBtn = document.getElementById('delete_users');
const deleteBooksBtn = document.getElementById('delete_books');

const signInBtn = document.getElementById('sign_in');
const signUpBtn = document.getElementById('sign_up');
const disconnectBtn = document.getElementById('disconnect');
const addBookBtn = document.getElementById('add_book');

usersBtn.addEventListener('click', async () => {
    const request = await fetch('/super-week/users');
    const users = await request.json();
    contentDiv.innerHTML = "";
    for (user of users) {
        contentDiv.innerHTML += (
            `<h3>User : ${user.first_name} ${user.last_name} </h3>
            id : ${user.id} <br>
            Email : ${user.email}
            <hr>`
            );
    }
})

booksBtn.addEventListener('click', async () => {
    const request = await fetch('/super-week/books');
    const books = await request.json();
    contentDiv.innerHTML = "";
    for (book of books) {
        contentDiv.innerHTML += (
            `<h3>Title : ${book.title}</h3>
            Id : ${book.id} <br>
            Owner id ${book.id_user}
            <hr>`
            );
    }
})

userForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const idUser = userInput.value;
    const request = await fetch('/super-week/users/' + idUser);
    const user = await request.json();
    contentDiv.innerHTML = (
        `<h3>User : ${user.first_name} ${user.last_name} </h3>
        Id : ${user.id} <br>
        Email : ${user.email}`
        );
})

bookForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const idBook = bookInput.value;
    const request = await fetch('/super-week/books/' + idBook);
    const book = await request.json();
    contentDiv.innerHTML = (
        `<h3>Book : ${book.title}</h3>
        Id : ${book.id} <br>
        Owner id : ${book.id_user} <br>
        <p>Content : ${book.content}</p>`
        );
})

generateUsersBtn.addEventListener('click', () => {
    fetch('/super-week/faker/users');
})

generateBooksBtn.addEventListener('click', () => {
    fetch('/super-week/faker/books');
})

deleteUsersBtn.addEventListener('click', () => {
    fetch('/super-week/users/delete');
})

deleteBooksBtn.addEventListener('click', () => {
    fetch('/super-week/books/delete');
})

signUpBtn?.addEventListener('click', () => {
    window.location.href = "/super-week/register";
})

signInBtn?.addEventListener('click', () => {
    window.location.href = "/super-week/login";
})

disconnectBtn?.addEventListener('click', () => {
    window.location.href = "/super-week/logout";
})

addBookBtn?.addEventListener('click', () => {
    window.location.href = "/super-week/books/write";
})