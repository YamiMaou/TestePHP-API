<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    private $uri = "/api/category";
    public function test_cat_index()
    {
        $response = $this->get($this->uri);

        $response->assertStatus(200);
    }

    public function test_cat_create()
    {
        $response = $this->post($this->uri,["name" => "CAT_TEST"]);

        $response->assertStatus(200);
    }

    public function test_cat_show()
    {
        $response = $this->get("{$this->uri}/1");

        $response->assertStatus(200);
    }

    public function test_cat_update()
    {
        $response = $this->patch("{$this->uri}/1",["name" => "CAT_TEST_UPT"]);

        $response->assertStatus(200);
    }

    public function test_cat_delete()
    {
        $response = $this->delete("{$this->uri}/1",["name" => "CAT_TEST_UPT"]);

        $response->assertStatus(200);
    }
}
