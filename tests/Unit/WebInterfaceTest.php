<?php

namespace FsearchTests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class WebInterfaceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->get('/fs');
        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSearchNoPost()
    {
        $response = $this->get('/fs/search');
        $response->assertStatus(405);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSearchPost()
    {
        $response = $this->post('/fs/search', [
            'path' => '/laragon/www/fsearch',
            'content' => 'public function'
        ]);
        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSearchWrongPost()
    {
        $response = $this->post('/fs/search');
        $response->assertSee('Invalid directory');
    }
}
