<?php

use \Gvera\Helpers\entities\Paginator;
use \PHPUnit\Framework\TestCase;

class PaginatorTest extends TestCase
{
    /**
     * @test
     */
    public function testPaginate()
    {
        $pageableObjects = [
            "1", "2", "3", "4", "5",
            "1", "2", "3", "4", "5",
            "1", "2", "3", "4", "5",
            "1", "2", "3", "4", "5",
            "1", "2", "3", "4", "5",
            ];
        $paginator = new Paginator($pageableObjects);
        $this->assertTrue($paginator->getTotalPages() == 2);

        $paginator->setPage(1);
        $this->assertTrue(count($paginator->paginate()) === Paginator::DEFAULT_PAGE_SIZE);

        $paginator->setSize(5);
        $paginator->setPage(2);
        $pageTwoResult = $paginator->paginate();

        $this->assertTrue($pageTwoResult[1] == 2);

        $this->assertTrue($paginator->getTotalItems() === 25);

        $this->assertTrue($paginator->getSize() == 5);
    }
}