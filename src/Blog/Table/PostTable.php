<?php

namespace App\Blog\Table;

use App\Blog\Entity\Post;
use Framework\Database\PaginatedQuery;
use Pagerfanta\Pagerfanta;
use PDO;
use stdClass;

class PostTable
{

    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        
        $this->pdo = $pdo;
    }
    
   /**
    *
    * @param int $perPage
    * @return Pagerfanta\Pergerfanta
    */
    public function findPaginated(int $perPage, int $currentPage)
    {
        $query = new PaginatedQuery(
            $this->pdo,
            'SELECT * FROM posts ORDER BY created_at DESC',
            'SELECT COUNT(id) FROM posts',
            Post::class
        );
        
        return (new Pagerfanta($query))
                    ->setMaxPerPage($perPage)
                    ->setCurrentPage($currentPage);
    }
    
    /**
     * Recupère un article à partir de son ID
     * @param int $id
     * @return Post|null
     */
    public function find(int $id): ?Post
    {
        $query = $this->pdo
                ->prepare('SELECT * FROM posts WHERE id = ?');
        $query->execute([$id]);
        $query->setFetchMode(\PDO::FETCH_CLASS, Post::class);
        return $query->fetch() ?: null;
    }
}
