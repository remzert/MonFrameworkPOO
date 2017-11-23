<?php

namespace Tests\App\Blog\Table;

use App\Blog\Entity\Post;
use App\Blog\Table\PostTable;
use Tests\DatabaseTestCase;



class PostTableTest extends DatabaseTestCase
{
    /**
     *
     * @var PostTable
     */
    private $postTable;

    public function setUp()
    {
        parent::setUp();
        $this->postTable = new PostTable($this->pdo);
        //$this->pdo->beginTransction();
                  
    }
    /* public function tearDown()
      {
         $this->pdo->rollBack();
      }
     */
    
    public function testFind(){
        $this->seedDatabase();
        $post = $this->postTable->find(1);
        $this->assertInstanceOf(Post::class, $post);
    }
    
    public function testFindNotFoundRecord()
    {
        $post = $this->postTable->find(1);
        $this->assertNull($post);
    }
}

