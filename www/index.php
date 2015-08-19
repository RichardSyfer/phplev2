<?php
require_once __DIR__ . '/autoload.php';

if (!empty($_POST)) {
    $adm = new AdminController();
    $adm->actionAddNews();
    die;
}

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

try {

    $controllerClassName = $ctrl . 'Controller';

    $controller = new $controllerClassName;

    $method = 'action' . $act;
    $controller->$method();

} catch (E404Exception $e) {

    new ErrLogger($e);

    $view = new View();
    $view->error = $e->getMessage();

    header("HTTP/1.0 404 Not Found");
    header("HTTP/1.1 404 Not Found");
    header("Status: 404 Not Found");
    $view->display('errors/404.php');

} catch (PDOException $e) {

    new ErrLogger($e);

    $view = new View();
    $view->error = $e->getMessage();

    header("HTTP/1.0 403 Forbidden");
    header("HTTP/1.1 403 Forbidden");
    header("Status: 403 Forbidden");
    $view->display('errors/403.php');
}
