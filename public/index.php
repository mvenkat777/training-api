<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$container = new \DI\Container();

AppFactory::setContainer($container);
$app = AppFactory::create();

// Add Routing Middleware
$app->addRoutingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$container->set('mysqlPDO', function () {
    return new \Tr\Database\MysqlPDO('root', 'mysql', 'localhost', '3306', 'Training');
});

$container->set('courseRepository', function () use ($container) {
    return new \Tr\Api\Repository\CourseRepository($container->get('mysqlPDO'));
});

$container->set('apiCourseController', function () use ($container) {
    return new \Tr\Api\Controller\CourseController(
        $container->get('courseRepository')
    );
});

$container->set('sessionRepository', function () use ($container) {
    return new \Tr\Api\Repository\SessionRepository($container->get('mysqlPDO'));
});

$container->set('apiSessionController', function () use ($container) {
    return new \Tr\Api\Controller\SessionController(
        $container->get('sessionRepository')
    );
});

/* Routes Start */
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Build Training API ");
    return $response;
});

$app->get('/api/courses', function (Request $request, Response $response, $args) use ($container) {
    $controller = $container->get('apiCourseController');
    return $controller->getList($request, $response);
});

// Define app routes
// $app->get('/hello/:name', function (Request $request, Response $response, $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");
//     return $response;
// });

// $app->get('/books/{id}', function ($request, $response, $args) {
//     // Show book identified by $args['id']
//     $bookId = $args['id'];
//     $response->getBody()->write("Book, $bookId");
//     return $response;
// });

$app->get('/api/sessions', function (Request $request, Response $response, $args) use ($container) {
    $controller = $container->get('apiSessionController');
    return $controller->getSessionsHistory($request, $response);
});

// Run app
$app->run();
