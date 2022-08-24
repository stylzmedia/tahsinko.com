<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ProductSpecification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductSpecificationController
 */
class ProductSpecificationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $productSpecifications = ProductSpecification::factory()->count(3)->create();

        $response = $this->get(route('product-specification.index'));

        $response->assertOk();
        $response->assertViewIs('productSpecification.index');
        $response->assertViewHas('productSpecifications');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('product-specification.create'));

        $response->assertOk();
        $response->assertViewIs('productSpecification.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductSpecificationController::class,
            'store',
            \App\Http\Requests\ProductSpecificationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $name = $this->faker->name;
        $position = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->post(route('product-specification.store'), [
            'product_id' => $product_id,
            'name' => $name,
            'position' => $position,
            'status' => $status,
        ]);

        $productSpecifications = ProductSpecification::query()
            ->where('product_id', $product_id)
            ->where('name', $name)
            ->where('position', $position)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $productSpecifications);
        $productSpecification = $productSpecifications->first();

        $response->assertRedirect(route('productSpecification.index'));
        $response->assertSessionHas('productSpecification.id', $productSpecification->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $productSpecification = ProductSpecification::factory()->create();

        $response = $this->get(route('product-specification.show', $productSpecification));

        $response->assertOk();
        $response->assertViewIs('productSpecification.show');
        $response->assertViewHas('productSpecification');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $productSpecification = ProductSpecification::factory()->create();

        $response = $this->get(route('product-specification.edit', $productSpecification));

        $response->assertOk();
        $response->assertViewIs('productSpecification.edit');
        $response->assertViewHas('productSpecification');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductSpecificationController::class,
            'update',
            \App\Http\Requests\ProductSpecificationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $productSpecification = ProductSpecification::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $name = $this->faker->name;
        $position = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->put(route('product-specification.update', $productSpecification), [
            'product_id' => $product_id,
            'name' => $name,
            'position' => $position,
            'status' => $status,
        ]);

        $productSpecification->refresh();

        $response->assertRedirect(route('productSpecification.index'));
        $response->assertSessionHas('productSpecification.id', $productSpecification->id);

        $this->assertEquals($product_id, $productSpecification->product_id);
        $this->assertEquals($name, $productSpecification->name);
        $this->assertEquals($position, $productSpecification->position);
        $this->assertEquals($status, $productSpecification->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $productSpecification = ProductSpecification::factory()->create();

        $response = $this->delete(route('product-specification.destroy', $productSpecification));

        $response->assertRedirect(route('productSpecification.index'));

        $this->assertDeleted($productSpecification);
    }
}
