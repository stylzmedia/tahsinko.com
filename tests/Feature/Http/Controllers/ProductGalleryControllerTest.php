<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ProductGallery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductGalleryController
 */
class ProductGalleryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $productGalleries = ProductGallery::factory()->count(3)->create();

        $response = $this->get(route('product-gallery.index'));

        $response->assertOk();
        $response->assertViewIs('productGallery.index');
        $response->assertViewHas('productGalleries');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('product-gallery.create'));

        $response->assertOk();
        $response->assertViewIs('productGallery.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductGalleryController::class,
            'store',
            \App\Http\Requests\ProductGalleryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $image = $this->faker->word;

        $response = $this->post(route('product-gallery.store'), [
            'product_id' => $product_id,
            'image' => $image,
        ]);

        $productGalleries = ProductGallery::query()
            ->where('product_id', $product_id)
            ->where('image', $image)
            ->get();
        $this->assertCount(1, $productGalleries);
        $productGallery = $productGalleries->first();

        $response->assertRedirect(route('productGallery.index'));
        $response->assertSessionHas('productGallery.id', $productGallery->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $productGallery = ProductGallery::factory()->create();

        $response = $this->get(route('product-gallery.show', $productGallery));

        $response->assertOk();
        $response->assertViewIs('productGallery.show');
        $response->assertViewHas('productGallery');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $productGallery = ProductGallery::factory()->create();

        $response = $this->get(route('product-gallery.edit', $productGallery));

        $response->assertOk();
        $response->assertViewIs('productGallery.edit');
        $response->assertViewHas('productGallery');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductGalleryController::class,
            'update',
            \App\Http\Requests\ProductGalleryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $productGallery = ProductGallery::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $image = $this->faker->word;

        $response = $this->put(route('product-gallery.update', $productGallery), [
            'product_id' => $product_id,
            'image' => $image,
        ]);

        $productGallery->refresh();

        $response->assertRedirect(route('productGallery.index'));
        $response->assertSessionHas('productGallery.id', $productGallery->id);

        $this->assertEquals($product_id, $productGallery->product_id);
        $this->assertEquals($image, $productGallery->image);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $productGallery = ProductGallery::factory()->create();

        $response = $this->delete(route('product-gallery.destroy', $productGallery));

        $response->assertRedirect(route('productGallery.index'));

        $this->assertDeleted($productGallery);
    }
}
