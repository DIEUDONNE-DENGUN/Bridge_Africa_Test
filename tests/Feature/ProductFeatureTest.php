<?php

namespace Tests\Feature;

use Tests\TestCase;


class ProductFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowAddProductPageNotLogin()
    {
        $response = $this->get('add_product');
        $response->assertStatus(302);
    }

    public function testShowProductListPageNotLogin()
    {
        $response = $this->get('products/list');
        $response->assertStatus(302);
    }
}
