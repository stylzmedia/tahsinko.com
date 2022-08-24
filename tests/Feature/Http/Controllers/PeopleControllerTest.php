<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PeopleController
 */
class PeopleControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $people = People::factory()->count(3)->create();

        $response = $this->get(route('person.index'));

        $response->assertOk();
        $response->assertViewIs('person.index');
        $response->assertViewHas('people');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('person.create'));

        $response->assertOk();
        $response->assertViewIs('person.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PeopleController::class,
            'store',
            \App\Http\Requests\PeopleStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $type = $this->faker->word;
        $position = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->post(route('person.store'), [
            'type' => $type,
            'position' => $position,
            'status' => $status,
        ]);

        $people = Person::query()
            ->where('type', $type)
            ->where('position', $position)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $people);
        $person = $people->first();

        $response->assertRedirect(route('person.index'));
        $response->assertSessionHas('person.id', $person->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $person = People::factory()->create();

        $response = $this->get(route('person.show', $person));

        $response->assertOk();
        $response->assertViewIs('person.show');
        $response->assertViewHas('person');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $person = People::factory()->create();

        $response = $this->get(route('person.edit', $person));

        $response->assertOk();
        $response->assertViewIs('person.edit');
        $response->assertViewHas('person');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PeopleController::class,
            'update',
            \App\Http\Requests\PeopleUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $person = People::factory()->create();
        $type = $this->faker->word;
        $position = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->put(route('person.update', $person), [
            'type' => $type,
            'position' => $position,
            'status' => $status,
        ]);

        $person->refresh();

        $response->assertRedirect(route('person.index'));
        $response->assertSessionHas('person.id', $person->id);

        $this->assertEquals($type, $person->type);
        $this->assertEquals($position, $person->position);
        $this->assertEquals($status, $person->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $person = People::factory()->create();
        $person = Person::factory()->create();

        $response = $this->delete(route('person.destroy', $person));

        $response->assertRedirect(route('person.index'));

        $this->assertDeleted($person);
    }
}
