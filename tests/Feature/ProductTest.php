<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    private $uri = "/api/product";
    public function test_prod_index()
    {
        $response = $this->get($this->uri);

        $response->assertStatus(200);
    }

    public function test_prod_create()
    {
        $category = \App\Models\Category::create(["name" => "CAT_PROD_TEST"]);
        $response = $this->post($this->uri,["name" => "PROD_TEST", "category_id" => $category->id]);
        $response->assertStatus(200);
    }

    public function test_prod_show()
    {
        $response = $this->get("{$this->uri}/1");

        $response->assertStatus(200);
    }

    public function test_prod_update()
    {
        $response = $this->patch("{$this->uri}/1",["name" => "PROD_TEST_UPT", "category_id" => 1 ]);

        $response->assertStatus(200);
    }

    public function test_prod_delete()
    {
        $response = $this->delete("{$this->uri}/1",["name" => "PROD_TEST_UPT"]);

        $response->assertStatus(200);
    }
}
