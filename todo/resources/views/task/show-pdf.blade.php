<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif
        }
    </style>
</head>
<body>
    <h1>{{$task->title}}</h1>
    <p>{{ $task->description  }}</p>
    <hr>
    <ul>
        <li><strong>Completed: </strong>{{$task->completed ? 'Yes' : 'No'}}</li>
        <li><strong>Due Date: </strong>{{$task->due_date}}</li>
        <li><strong>Author: </strong>{{$task->user->name}}</li>
        <li><strong>Category: </strong>{{$task->category ? $task->category->category[app()->getLocale()] ??  $task->category->category['en'] : ''}}</li>
    </ul>
    <hr>
</body>
</html>