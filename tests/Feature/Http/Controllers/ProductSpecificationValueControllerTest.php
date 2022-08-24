<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ProductSpecificationValue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductSpecificationValueController
 */
class ProductSpecificationValueControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $productSpecificationValues = ProductSpecificationValue::factory()->count(3)->create();

        $response = $this->get(route('product-specification-value.index'));

        $response->assertOk();
        $response->assertViewIs('productSpecificationValue.index');
        $response->assertViewHas('productSpecificationValues');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('product-specification-value.create'));

        $response->assertOk();
        $response->assertViewIs('productSpecificationValue.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductSpecificationValueController::class,
            'store',
            \App\Http\Requests\ProductSpecificationValueStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $product_specification_id = $this->faker->numberBetween(-100000, 100000);
        $name = $this->faker->name;

        $response = $this->post(route('product-specification-value.store'), [
            'product_specification_id' => $product_specification_id,
            'name' => $name,
        ]);

        $productSpecificationValues = ProductSpecificationValue::query()
            ->where('product_specification_id', $product_specification_id)
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $productSpecificationValues);
        $productSpecificationValue = $productSpecificationValues->first();

        $response->assertRedirect(route('productSpecificationValue.index'));
        $response->assertSessionHas('productSpecificationValue.id', $productSpecificationValue->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $productSpecificationValue = ProductSpecificationValue::factory()->create();

        $response = $this->get(route('product-specification-value.show', $productSpecificationValue));

        $response->assertOk();
        $response->assertViewIs('productSpecificationValue.show');
        $response->assertViewHas('productSpecificationValue');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $productSpecificationValue = ProductSpecificationValue::factory()->create();

        $response = $this->get(route('product-specification-value.edit', $productSpecificationValue));

        $response->assertOk();
        $response->assertViewIs('productSpecificationValue.edit');
        $response->assertViewHas('productSpecificationValue');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductSpecificationValueController::class,
            'update',
            \App\Http\Requests\ProductSpecificationValueUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $productSpecificationValue = ProductSpecificationValue::factory()->create();
        $product_specification_id = $this->faker->numberBetween(-100000, 100000);
        $name = $this->faker->name;

        $response = $this->put(route('product-specification-value.update', $productSpecificationValue), [
            'product_specification_id' => $product_specification_id,
            'name' => $name,
        ]);

        $productSpecificationValue->refresh();

        $response->assertRedirect(route('productSpecificationValue.index'));
        $response->assertSessionHas('productSpecificationValue.id', $productSpecificationValue->id);

        $this->assertEquals($product_specification_id, $productSpecificationValue->product_specification_id);
        $this->assertEquals($name, $productSpecificationValue->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $productSpecificationValue = ProductSpecificationValue::factory()->create();

        $response = $this->delete(route('product-specification-value.destroy', $productSpecificationValue));

        $response->assertRedirect(route('productSpecificationValue.index'));

        $this->assertDeleted($productSpecificationValue);
    }
}
