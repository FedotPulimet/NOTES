<?php
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../app/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

$controller = new \controllers\NoteController();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

switch (true) {
    case str_contains($path, '/show'):
        $id = $_GET['id'] ?? null;
        $controller->show($id);
        break;

    case $path === '/create' && $method === 'GET':
        $controller->create(); 
        break;
    case $path === '/create' && $method === 'POST':
        $controller->create(); 
        break;

    case str_contains($path, '/edit') && $method === 'GET':
        $id = $_GET['id'] ?? null;
        $controller->edit($id);
        break;
    case str_contains($path, '/edit') && $method === 'POST':
        $id = $_GET['id'] ?? null;
        $controller->edit($id); 
        break;

    case str_contains($path, '/delete'):
        $id = $_GET['id'] ?? null;
        $controller->delete($id);
        break;

    default:
        $controller->index();
}