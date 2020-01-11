<?php
namespace Tr\Api\Repository;

use Tr\Database\MysqlPDO;

class SessionRepository
{
    /** @var MysqlPDO */
    private $mysqlPDO;

    public function __construct(MysqlPDO $mysqlPDO)
    {
        $this->mysqlPDO = $mysqlPDO;
    }

    /**
     * @return Session[]
     */
    public function getSessionsByUser($userId): array
    {
        $query = 'SELECT a.session_id, a.score, UNIX_TIMESTAMP(b.date) as date 
                    FROM `Scores` a 
                    JOIN `Sessions` b ON a.session_id = b.session_id 
                    WHERE user_id = %d 
                    ORDER BY b.date DESC';

        $query = sprintf($query, $userId);

        $statement = $this->mysqlPDO->getConnection()->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function recentlyTrainedCategory($sessionId):array
    {
        $query = 'SELECT g.name 
                    FROM Session_exercise se 
                    INNER JOIN Exercises x ON x.exercise_id = se.exercise_id
                    INNER JOIN Categories g ON g.cat_id = x.cat_id
                    WHERE se.session_id = %d';
        
        $query = sprintf($query, $sessionId);

        $statement = $this->mysqlPDO->getConnection()->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

}
