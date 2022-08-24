<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Value;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ValueController
 */
class ValueControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $values = Value::factory()->count(3)->create();

        $response = $this->get(route('value.index'));

        $response->assertOk();
        $response->assertViewIs('value.index');
        $response->assertViewHas('values');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('value.create'));

        $response->assertOk();
        $response->assertViewIs('value.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ValueController::class,
            'store',
            \App\Http\Requests\ValueStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->post(route('value.store'), [
            'title' => $title,
            'status' => $status,
        ]);

        $values = Value::query()
            ->where('title', $title)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $values);
        $value = $values->first();

        $response->assertRedirect(route('value.index'));
        $response->assertSessionHas('value.id', $value->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $value = Value::factory()->create();

        $response = $this->get(route('value.show', $value));

        $response->assertOk();
        $response->assertViewIs('value.show');
        $response->assertViewHas('value');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $value = Value::factory()->create();

        $response = $this->get(route('value.edit', $value));

        $response->assertOk();
        $response->assertViewIs('value.edit');
        $response->assertViewHas('value');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ValueController::class,
            'update',
            \App\Http\Requests\ValueUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $value = Value::factory()->create();
        $title = $this->faker->sentence(4);
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->put(route('value.update', $value), [
            'title' => $title,
            'status' => $status,
        ]);

        $value->refresh();

        $response->assertRedirect(route('value.index'));
        $response->assertSessionHas('value.id', $value->id);

        $this->assertEquals($title, $value->title);
        $this->assertEquals($status, $value->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $value = Value::factory()->create();

        $response = $this->delete(route('value.destroy', $value));

        $response->assertRedirect(route('value.index'));

        $this->assertDeleted($value);
    }
}
