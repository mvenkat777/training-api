<?php
namespace Tr\Api\Controller;

use Tr\Api\Repository\SessionRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SessionController
{
    /** @var SessionRepository */
    protected $sessionRepository;

    public function __construct(
        SessionRepository $sessionRepository
    ) {
        $this->sessionRepository = $sessionRepository;
    }

    public function getSessionsHistory(Request $request, Response $response): Response
    {
        $params = $request->getqueryParams();

        if(isset($params['userId']) && !empty($params['userId'])){

            $sessions = $this->sessionRepository->getSessionsByUser($params['userId']);
            //echo "<pre>";print_r($sessions);exit();
            if(isset($params['category']) && ($params['category'] == true)){
                if(count($sessions) > 0){
                    $category = $this->sessionRepository->recentlyTrainedCategory($sessions[0]['session_id']);
                    $fillCategory = [];
                    if(count($category) > 0){
                        foreach($category as $key => $cat){
                            $fillCategory[] = $cat['name'];
                        }
                    }
                    $categoryName = implode(",",array_unique($fillCategory));
                }                
            }
            //echo "<pre>";print_r($category);exit(); 
            $history = ["history" => $sessions];
            if(!empty($categoryName)){
                $history["lastSessionCategoryTrained"] = $categoryName;
            }
            $response = $response->withHeader('Content-Type', 'application/json');
            $response = $response->withStatus(200);
            $response->getBody()->write(json_encode($history));    
        
        }else{
            $response = $response->withStatus(500);
            $response->getBody()->write("userId not provided");
        }

        return $response;
    }
}