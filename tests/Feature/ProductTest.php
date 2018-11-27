<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Inventory;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function fetch_all_of_the_products()
    {
        factory(Product::class)->create([
            'status' => Product::ACTIVE_STATUS
        ]);

        factory(Product::class)->create();


        $response = $this->get('/');

        $response->assertViewIs('welcome');
        $products = Product::available()->get();
       //dd($products) ;
        $response->assertViewHas('products', $products);

        $this->assertCount(2, $products);

    }

    /** @test */
    public function fetch_one_of_product()
    {

        $product = factory(Product::class)->create();


        $response = $this->get('/products/' . $product->slug);

        $response->assertViewIs('product');

        $response->assertSee($product->title);
    }
    /** @test */
    public function a_product_has_different_sizes()
    {

        $product = factory(Product::class)->create();

        factory(Inventory::class, 3)->create([
            'product_id' => $product->id,
            'size' => Inventory::M_SIZE,
        ]);

        factory(Inventory::class, 3)->create([
            'product_id' => $product->id,
            'size' => Inventory::L_SIZE,
        ]);



        $response = $this->get('/products/' . $product->slug);
        $response->assertViewHas('sizes', ['m', 'l']);

    }

    /** @test */
    public function a_product_has_different_colors()
    {

        $product = factory(Product::class)->create();

        factory(Inventory::class, 3)->create([
            'product_id' => $product->id,
            'color' => 'red',
        ]);

        factory(Inventory::class, 3)->create([
            'product_id' => $product->id,
            'color' => 'blue',
        ]);

        $response = $this->get('/products/' . $product->slug);
        $response->assertViewHas('colors', ['red', 'blue']);

    }
}
