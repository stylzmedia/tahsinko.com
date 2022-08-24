<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductController
 */
class ProductControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $products = Product::factory()->count(3)->create();

        $response = $this->get(route('product.index'));

        $response->assertOk();
        $response->assertViewIs('product.index');
        $response->assertViewHas('products');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('product.create'));

        $response->assertOk();
        $response->assertViewIs('product.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductController::class,
            'store',
            \App\Http\Requests\ProductStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $category_id = $this->faker->numberBetween(-100000, 100000);
        $name = $this->faker->name;
        $description = $this->faker->text;
        $freature_image = $this->faker->word;
        $video = $this->faker->word;
        $position = $this->faker->numberBetween(-10000, 10000);
        $pdf_file = $this->faker->word;
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->post(route('product.store'), [
            'category_id' => $category_id,
            'name' => $name,
            'description' => $description,
            'freature_image' => $freature_image,
            'video' => $video,
            'position' => $position,
            'pdf_file' => $pdf_file,
            'status' => $status,
        ]);

        $products = Product::query()
            ->where('category_id', $category_id)
            ->where('name', $name)
            ->where('description', $description)
            ->where('freature_image', $freature_image)
            ->where('video', $video)
            ->where('position', $position)
            ->where('pdf_file', $pdf_file)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $products);
        $product = $products->first();

        $response->assertRedirect(route('product.index'));
        $response->assertSessionHas('product.id', $product->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.show', $product));

        $response->assertOk();
        $response->assertViewIs('product.show');
        $response->assertViewHas('product');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.edit', $product));

        $response->assertOk();
        $response->assertViewIs('product.edit');
        $response->assertViewHas('product');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductController::class,
            'update',
            \App\Http\Requests\ProductUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $product = Product::factory()->create();
        $category_id = $this->faker->numberBetween(-100000, 100000);
        $name = $this->faker->name;
        $description = $this->faker->text;
        $freature_image = $this->faker->word;
        $video = $this->faker->word;
        $position = $this->faker->numberBetween(-10000, 10000);
        $pdf_file = $this->faker->word;
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->put(route('product.update', $product), [
            'category_id' => $category_id,
            'name' => $name,
            'description' => $description,
            'freature_image' => $freature_image,
            'video' => $video,
            'position' => $position,
            'pdf_file' => $pdf_file,
            'status' => $status,
        ]);

        $product->refresh();

        $response->assertRedirect(route('product.index'));
        $response->assertSessionHas('product.id', $product->id);

        $this->assertEquals($category_id, $product->category_id);
        $this->assertEquals($name, $product->name);
        $this->assertEquals($description, $product->description);
        $this->assertEquals($freature_image, $product->freature_image);
        $this->assertEquals($video, $product->video);
        $this->assertEquals($position, $product->position);
        $this->assertEquals($pdf_file, $product->pdf_file);
        $this->assertEquals($status, $product->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('product.destroy', $product));

        $response->assertRedirect(route('product.index'));

        $this->assertDeleted($product);
    }
}
