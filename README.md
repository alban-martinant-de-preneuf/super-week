# Super Week Project

Welcome to our exciting project! This is a demonstration of our development skills, showcasing our knowledge of various concepts.

## Project Setup

As developers, we know the importance of version control. So, we've initialized a new git project to keep track of our modifications.

## Routing

We've installed a router on our project, giving us clean URLs and a solid foundation. We followed the documentation carefully and installed the router. We then imported it into our index.php file at the root of our project and used composer's autoloader to retrieve the AltoRouter class. 

## Database

We've created a database with two tables: user and book, and added some dummy data to play with in phpMyAdmin.

## Project Architecture

We've created a src/ folder at the root of our project. Inside this folder, we've created three subfolders: Model/, Controller/, and View/.

    Model/: This folder contains all the classes that make database queries. All the classes in this folder have the namespace App\Model.
    Controller/: This folder contains all the classes that manipulate data sent to or received from the Model. All the classes in this folder have the namespace App\Controller.
    View/: This folder contains all the template files used to display information to the user. There are no classes in this folder.

We've updated the composer.json file to add the App namespace to our autoloader.
User Controller

Thanks for checking out our project!