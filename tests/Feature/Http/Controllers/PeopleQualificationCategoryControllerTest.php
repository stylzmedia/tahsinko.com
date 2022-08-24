<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\PeopleQualificationCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PeopleQualificationCategoryController
 */
class PeopleQualificationCategoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $peopleQualificationCategories = PeopleQualificationCategory::factory()->count(3)->create();

        $response = $this->get(route('people-qualification-category.index'));

        $response->assertOk();
        $response->assertViewIs('peopleQualificationCategory.index');
        $response->assertViewHas('peopleQualificationCategories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('people-qualification-category.create'));

        $response->assertOk();
        $response->assertViewIs('peopleQualificationCategory.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PeopleQualificationCategoryController::class,
            'store',
            \App\Http\Requests\PeopleQualificationCategoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $people_qualification_id = $this->faker->numberBetween(-10000, 10000);
        $title = $this->faker->sentence(4);
        $position = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->post(route('people-qualification-category.store'), [
            'people_qualification_id' => $people_qualification_id,
            'title' => $title,
            'position' => $position,
            'status' => $status,
        ]);

        $peopleQualificationCategories = PeopleQualificationCategory::query()
            ->where('people_qualification_id', $people_qualification_id)
            ->where('title', $title)
            ->where('position', $position)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $peopleQualificationCategories);
        $peopleQualificationCategory = $peopleQualificationCategories->first();

        $response->assertRedirect(route('peopleQualificationCategory.index'));
        $response->assertSessionHas('peopleQualificationCategory.id', $peopleQualificationCategory->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $peopleQualificationCategory = PeopleQualificationCategory::factory()->create();

        $response = $this->get(route('people-qualification-category.show', $peopleQualificationCategory));

        $response->assertOk();
        $response->assertViewIs('peopleQualificationCategory.show');
        $response->assertViewHas('peopleQualificationCategory');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $peopleQualificationCategory = PeopleQualificationCategory::factory()->create();

        $response = $this->get(route('people-qualification-category.edit', $peopleQualificationCategory));

        $response->assertOk();
        $response->assertViewIs('peopleQualificationCategory.edit');
        $response->assertViewHas('peopleQualificationCategory');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PeopleQualificationCategoryController::class,
            'update',
            \App\Http\Requests\PeopleQualificationCategoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $peopleQualificationCategory = PeopleQualificationCategory::factory()->create();
        $people_qualification_id = $this->faker->numberBetween(-10000, 10000);
        $title = $this->faker->sentence(4);
        $position = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->put(route('people-qualification-category.update', $peopleQualificationCategory), [
            'people_qualification_id' => $people_qualification_id,
            'title' => $title,
            'position' => $position,
            'status' => $status,
        ]);

        $peopleQualificationCategory->refresh();

        $response->assertRedirect(route('peopleQualificationCategory.index'));
        $response->assertSessionHas('peopleQualificationCategory.id', $peopleQualificationCategory->id);

        $this->assertEquals($people_qualification_id, $peopleQualificationCategory->people_qualification_id);
        $this->assertEquals($title, $peopleQualificationCategory->title);
        $this->assertEquals($position, $peopleQualificationCategory->position);
        $this->assertEquals($status, $peopleQualificationCategory->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $peopleQualificationCategory = PeopleQualificationCategory::factory()->create();

        $response = $this->delete(route('people-qualification-category.destroy', $peopleQualificationCategory));

        $response->assertRedirect(route('peopleQualificationCategory.index'));

        $this->assertDeleted($peopleQualificationCategory);
    }
}
