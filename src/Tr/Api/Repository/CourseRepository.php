<?php
namespace Tr\Api\Repository;

use Tr\Database\MysqlPDO;

class CourseRepository
{
    /** @var MysqlPDO */
    private $mysqlPDO;

    public function __construct(MysqlPDO $mysqlPDO)
    {
        $this->mysqlPDO = $mysqlPDO;
    }

    /**
     * @return Course[]
     */
    public function getCourses(): array
    {
        $query =
            'SELECT 
                *
            FROM Courses
            ORDER BY course_id ASC';

        $statement = $this->mysqlPDO->getConnection()->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

}
