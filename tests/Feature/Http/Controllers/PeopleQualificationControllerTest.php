<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\PeopleQualification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PeopleQualificationController
 */
class PeopleQualificationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $peopleQualifications = PeopleQualification::factory()->count(3)->create();

        $response = $this->get(route('people-qualification.index'));

        $response->assertOk();
        $response->assertViewIs('peopleQualification.index');
        $response->assertViewHas('peopleQualifications');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('people-qualification.create'));

        $response->assertOk();
        $response->assertViewIs('peopleQualification.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PeopleQualificationController::class,
            'store',
            \App\Http\Requests\PeopleQualificationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $people_list_id = $this->faker->numberBetween(-10000, 10000);
        $title = $this->faker->sentence(4);
        $position = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->post(route('people-qualification.store'), [
            'people_list_id' => $people_list_id,
            'title' => $title,
            'position' => $position,
            'status' => $status,
        ]);

        $peopleQualifications = PeopleQualification::query()
            ->where('people_list_id', $people_list_id)
            ->where('title', $title)
            ->where('position', $position)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $peopleQualifications);
        $peopleQualification = $peopleQualifications->first();

        $response->assertRedirect(route('peopleQualification.index'));
        $response->assertSessionHas('peopleQualification.id', $peopleQualification->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $peopleQualification = PeopleQualification::factory()->create();

        $response = $this->get(route('people-qualification.show', $peopleQualification));

        $response->assertOk();
        $response->assertViewIs('peopleQualification.show');
        $response->assertViewHas('peopleQualification');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $peopleQualification = PeopleQualification::factory()->create();

        $response = $this->get(route('people-qualification.edit', $peopleQualification));

        $response->assertOk();
        $response->assertViewIs('peopleQualification.edit');
        $response->assertViewHas('peopleQualification');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PeopleQualificationController::class,
            'update',
            \App\Http\Requests\PeopleQualificationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $peopleQualification = PeopleQualification::factory()->create();
        $people_list_id = $this->faker->numberBetween(-10000, 10000);
        $title = $this->faker->sentence(4);
        $position = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->put(route('people-qualification.update', $peopleQualification), [
            'people_list_id' => $people_list_id,
            'title' => $title,
            'position' => $position,
            'status' => $status,
        ]);

        $peopleQualification->refresh();

        $response->assertRedirect(route('peopleQualification.index'));
        $response->assertSessionHas('peopleQualification.id', $peopleQualification->id);

        $this->assertEquals($people_list_id, $peopleQualification->people_list_id);
        $this->assertEquals($title, $peopleQualification->title);
        $this->assertEquals($position, $peopleQualification->position);
        $this->assertEquals($status, $peopleQualification->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $peopleQualification = PeopleQualification::factory()->create();

        $response = $this->delete(route('people-qualification.destroy', $peopleQualification));

        $response->assertRedirect(route('peopleQualification.index'));

        $this->assertDeleted($peopleQualification);
    }
}
