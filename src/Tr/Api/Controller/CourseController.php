<?php
namespace Tr\Api\Controller;

use Tr\Api\Repository\CourseRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CourseController
{
    /** @var CourseRepository */
    protected $courseRepository;

    public function __construct(
        CourseRepository $courseRepository
    ) {
        $this->courseRepository = $courseRepository;
    }

    public function getList(Request $request, Response $response): Response
    {
        $courses = $this->courseRepository->getCourses();

        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(200);
        $response->getBody()->write(json_encode($courses));

        return $response;
    }
}