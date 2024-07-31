<?php

declare(strict_types=1);
require_once __DIR__ . '/vendor/autoload.php';

$router = new Router();
$task   = new Task();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($router->getResourceId()) {
        $router->sendResponse(
            $task->getTask(
                $router->getResourceId()
            )
        );
        return;
    }
    $router->sendResponse($task->getAll());
    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newTask      = $task->add($router->getUpdates()->text, 35);
    $responseText = $newTask ? 'New task has been added' : 'Something went wrong';
    $router->sendResponse($responseText);

    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
    $requestData = $router->getUpdates();

    if (isset($requestData->action) && isset($requestData->id)) {
        $id = (int) $requestData->id;

        if ($requestData->action === 'complete') {
            $success = $task->complete($id);
            $responseText = $success ? 'Task marked as completed' : 'Failed to complete task';
        } elseif ($requestData->action === 'uncompleted') {
            $success = $task->uncompleted($id);
            $responseText = $success ? 'Task marked as uncompleted' : 'Failed to mark task as uncompleted';
        } else {
            $responseText = 'Invalid action specified';
        }

        $router->sendResponse($responseText);
        return;
    } else {
        $router->sendResponse('Action and ID parameters are required for PATCH request');
        return;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $requestData = $router->getUpdates();

    if (isset($requestData->id)) {
        $id = (int) $requestData->id;
        $success = $task->delete($id);

        if ($success) {
            $responseText = 'Task deleted successfully';
        } else {
            $responseText = 'Failed to delete task';
        }

        $router->sendResponse($responseText);
        return;
    } else {
        $router->sendResponse('ID parameter is required for DELETE request');
        return;
    }
}
