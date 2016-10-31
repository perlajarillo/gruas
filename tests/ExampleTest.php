<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('GRUAS JARILLO');
    }

/*    public function testDatabase()
    {
        // Make call to application...

        $this->seeInDatabase('grua', [
            'placas' => 'GRU001'
        ]);
    }*/

 
}
