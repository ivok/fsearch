<?php

namespace FsearchTests\Unit;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->get("/fs")
            ->assertStatus(200)
            ->assertSee('FSearch');
    }

    /**
     * @return void
     */
    public function testSearchNoPostTest()
    {
        $this->get("/fs/search")->assertStatus(405);
    }

    /**
     * @return void
     */
    public function testSearchEmptyPostTest()
    {
        $this->post("/fs/search", [])
            ->assertSee('Directory not found')
            ->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testSearchPostTest()
    {
        $this->post("/fs/search", ['path' => '/var/www/fsearch', 'function'])
            ->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testSearchNotFoundContentTest()
    {
        $this->post("/fs/search", ['path' => '/var/www/fsearch', 'alabala'])
            ->assertSee('Nothing found')
            ->assertStatus(200);
    }
}
