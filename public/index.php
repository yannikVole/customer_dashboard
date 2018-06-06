<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require "../vendor/autoload.php";
require "../src/config/Db.php";

//create app
$app = new \Slim\App;

//get app container
$container = $app->getContainer();

//register components
$container['view'] = function($container){
    return new \Slim\Views\PhpRenderer('../views/');
};

//index route
$app->get('/', function(Request $req, Response $res){
    return $this->view->render($res,'index.php',[
        'test' => 'testValue'
    ]);
})->setName('index');

//outsourced routes 
require_once '../src/routes/customers.php';

$app->run();