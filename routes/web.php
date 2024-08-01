<?php

declare(strict_types=1);
$task = new Task();

if (count($_GET) > 0 || count($_POST) > 0) {
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

$router->get('/',fn() => require 'view/pages/home.php');
$router->get('/todos',fn() => require 'view/pages/todos.php');
$router->get('/notes',fn() => require 'view/pages/notes.php');
$router->get('/login',fn() => require 'view/pages/auth/login.php');
$router->get('/register',fn() => require 'view/pages/auth/register.php');
$router->post('/register',fn() => (new User)->register($_POST['email'],$_POST['password']));