const usersBtn = document.getElementById('users');
const booksBtn = document.getElementById('books');
const userForm = document.getElementById('get_user_form');
const userInput = document.getElementById('user_input');
const bookForm = document.getElementById('get_book_form');
const bookInput = document.getElementById('book_input');
const contentDiv = document.getElementById('content');

const bdHandle = document.querySelectorAll('.bd_handle');

const userBtns = document.querySelectorAll('.user_btn');

usersBtn.addEventListener('click', async () => {
    const request = await fetch('/super-week/users');
    const users = await request.json();
    contentDiv.innerHTML = "";
    if (users.length > 0) {
        for (user of users) {
            contentDiv.innerHTML += (
                `<h3>User : ${user.first_name} ${user.last_name} </h3>
                id : ${user.id} <br>
                Email : ${user.email}
                <hr>`
            );
        }
    } else {
        contentDiv.innerHTML = `There are no users !`
    }
})

booksBtn.addEventListener('click', async () => {
    const request = await fetch('/super-week/books');
    const books = await request.json();
    contentDiv.innerHTML = "";
    if (books.length > 0) {
        for (book of books) {
            contentDiv.innerHTML += (
                `<h3>Title : ${book.title}</h3>
                Id : ${book.id} <br>
                Owner id ${book.id_user}
                <hr>`
            );
        }
    } else {
        contentDiv.innerHTML = `There are no books !`
    }
})

userForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const idUser = userInput.value;
    const request = await fetch('/super-week/users/' + idUser);
    if (request.ok) {
        const user = await request.json();
        if (user) {
            contentDiv.innerHTML = (
                `<h3>User : ${user.first_name} ${user.last_name} </h3>
                Id : ${user.id} <br>
                Email : ${user.email}`
            );
        } else {
            contentDiv.innerHTML = `<p>This user doesn't exist !</p>`
        }
    } else {
        contentDiv.innerHTML = `<p>Enter an id !</p>`
    }
})

bookForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const idBook = bookInput.value;
    const request = await fetch('/super-week/books/' + idBook);
    if (request.ok) {
        const book = await request.json();
        if (book) {
            contentDiv.innerHTML = (
                `<h3>Book : ${book.title}</h3>
                Id : ${book.id} <br>
                Owner id : ${book.id_user} <br>
                <p>Content : ${book.content}</p>`
            );
        } else {
            contentDiv.innerHTML = `<p>This book doesn't exist !</p>`
        }
    } else {
        contentDiv.innerHTML = `<p>Enter an id !</p>`
    }
})

const links = {
    "sign_in": "/super-week/login",
    "sign_up": "/super-week/register",
    "disconnect": "/super-week/logout",
    "add_book": "/super-week/books/write",
    "generate_users": "/super-week/faker/users",
    "generate_books": "/super-week/faker/books",
    "delete_users": "/super-week/users/delete",
    "delete_books": "/super-week/books/delete"
}

console.log(bdHandle)

bdHandle.forEach(button => {
    button.addEventListener('click', async (e) => {
        console.log("ok")
        const request = await fetch(links[e.target.id]);
        const text = await request.text();
        contentDiv.innerHTML = `<p>${text}</p>`;
    })
})

userBtns.forEach(button => {
    button.addEventListener('click', (e) => {
        window.location.href = links[e.target.id];
    })
})