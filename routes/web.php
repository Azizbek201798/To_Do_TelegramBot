<?php

declare(strict_types=1);
$task = new Task();

if (count($_GET) > 0 || count($_POST) > 0) {
    $var = 0;

    if (isset($_POST['text'])) {
        $task->add($_POST['text']);
    }

    if (isset($_GET['complete'])) {
        $task->complete($_GET['complete']);
    }

    if (isset($_GET['uncompleted'])) {
        $task->uncompleted($_GET['uncompleted']);
    }

    if (isset($_GET['delete'])) {
        $task->delete($_GET['delete']);
    }
}

Router::get('/',fn() => require 'view/pages/home.php');
Router::get('/todos',fn() => require 'view/pages/todos.php');
Router::get('/notes',fn() => require 'view/pages/notes.php');

Router::get('/login',fn() => require 'view/pages/auth/login.php');
Router::post('/login',fn() => (new User)->login($_POST['email'],$_POST['password'])); 
Router::get('/logout',fn() => (new User)->logout()); 

Router::get('/register',fn() => require 'view/pages/auth/register.php');
Router::post('/register',fn() => (new User)->register($_POST['email'],$_POST['password']));

Router::notFound();