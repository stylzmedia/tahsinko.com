<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\PeopleQualificationValue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PeopleQualificationValueController
 */
class PeopleQualificationValueControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $peopleQualificationValues = PeopleQualificationValue::factory()->count(3)->create();

        $response = $this->get(route('people-qualification-value.index'));

        $response->assertOk();
        $response->assertViewIs('peopleQualificationValue.index');
        $response->assertViewHas('peopleQualificationValues');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('people-qualification-value.create'));

        $response->assertOk();
        $response->assertViewIs('peopleQualificationValue.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PeopleQualificationValueController::class,
            'store',
            \App\Http\Requests\PeopleQualificationValueStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $people_qualification_category_id = $this->faker->numberBetween(-10000, 10000);
        $value = $this->faker->text;
        $position = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->post(route('people-qualification-value.store'), [
            'people_qualification_category_id' => $people_qualification_category_id,
            'value' => $value,
            'position' => $position,
            'status' => $status,
        ]);

        $peopleQualificationValues = PeopleQualificationValue::query()
            ->where('people_qualification_category_id', $people_qualification_category_id)
            ->where('value', $value)
            ->where('position', $position)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $peopleQualificationValues);
        $peopleQualificationValue = $peopleQualificationValues->first();

        $response->assertRedirect(route('peopleQualificationValue.index'));
        $response->assertSessionHas('peopleQualificationValue.id', $peopleQualificationValue->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $peopleQualificationValue = PeopleQualificationValue::factory()->create();

        $response = $this->get(route('people-qualification-value.show', $peopleQualificationValue));

        $response->assertOk();
        $response->assertViewIs('peopleQualificationValue.show');
        $response->assertViewHas('peopleQualificationValue');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $peopleQualificationValue = PeopleQualificationValue::factory()->create();

        $response = $this->get(route('people-qualification-value.edit', $peopleQualificationValue));

        $response->assertOk();
        $response->assertViewIs('peopleQualificationValue.edit');
        $response->assertViewHas('peopleQualificationValue');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PeopleQualificationValueController::class,
            'update',
            \App\Http\Requests\PeopleQualificationValueUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $peopleQualificationValue = PeopleQualificationValue::factory()->create();
        $people_qualification_category_id = $this->faker->numberBetween(-10000, 10000);
        $value = $this->faker->text;
        $position = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->put(route('people-qualification-value.update', $peopleQualificationValue), [
            'people_qualification_category_id' => $people_qualification_category_id,
            'value' => $value,
            'position' => $position,
            'status' => $status,
        ]);

        $peopleQualificationValue->refresh();

        $response->assertRedirect(route('peopleQualificationValue.index'));
        $response->assertSessionHas('peopleQualificationValue.id', $peopleQualificationValue->id);

        $this->assertEquals($people_qualification_category_id, $peopleQualificationValue->people_qualification_category_id);
        $this->assertEquals($value, $peopleQualificationValue->value);
        $this->assertEquals($position, $peopleQualificationValue->position);
        $this->assertEquals($status, $peopleQualificationValue->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $peopleQualificationValue = PeopleQualificationValue::factory()->create();

        $response = $this->delete(route('people-qualification-value.destroy', $peopleQualificationValue));

        $response->assertRedirect(route('peopleQualificationValue.index'));

        $this->assertDeleted($peopleQualificationValue);
    }
}
