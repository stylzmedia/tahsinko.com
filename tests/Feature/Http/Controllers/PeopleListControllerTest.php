<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\PeopleList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PeopleListController
 */
class PeopleListControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $peopleLists = PeopleList::factory()->count(3)->create();

        $response = $this->get(route('people-list.index'));

        $response->assertOk();
        $response->assertViewIs('peopleList.index');
        $response->assertViewHas('peopleLists');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('people-list.create'));

        $response->assertOk();
        $response->assertViewIs('peopleList.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PeopleListController::class,
            'store',
            \App\Http\Requests\PeopleListStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $people_id = $this->faker->numberBetween(-10000, 10000);
        $name = $this->faker->name;
        $designation = $this->faker->word;
        $department = $this->faker->word;
        $bio = $this->faker->text;
        $email = $this->faker->safeEmail;
        $phone = $this->faker->phoneNumber;
        $website_link = $this->faker->word;
        $image = $this->faker->word;
        $address = $this->faker->text;
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->post(route('people-list.store'), [
            'people_id' => $people_id,
            'name' => $name,
            'designation' => $designation,
            'department' => $department,
            'bio' => $bio,
            'email' => $email,
            'phone' => $phone,
            'website_link' => $website_link,
            'image' => $image,
            'address' => $address,
            'status' => $status,
        ]);

        $peopleLists = PeopleList::query()
            ->where('people_id', $people_id)
            ->where('name', $name)
            ->where('designation', $designation)
            ->where('department', $department)
            ->where('bio', $bio)
            ->where('email', $email)
            ->where('phone', $phone)
            ->where('website_link', $website_link)
            ->where('image', $image)
            ->where('address', $address)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $peopleLists);
        $peopleList = $peopleLists->first();

        $response->assertRedirect(route('peopleList.index'));
        $response->assertSessionHas('peopleList.id', $peopleList->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $peopleList = PeopleList::factory()->create();

        $response = $this->get(route('people-list.show', $peopleList));

        $response->assertOk();
        $response->assertViewIs('peopleList.show');
        $response->assertViewHas('peopleList');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $peopleList = PeopleList::factory()->create();

        $response = $this->get(route('people-list.edit', $peopleList));

        $response->assertOk();
        $response->assertViewIs('peopleList.edit');
        $response->assertViewHas('peopleList');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PeopleListController::class,
            'update',
            \App\Http\Requests\PeopleListUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $peopleList = PeopleList::factory()->create();
        $people_id = $this->faker->numberBetween(-10000, 10000);
        $name = $this->faker->name;
        $designation = $this->faker->word;
        $department = $this->faker->word;
        $bio = $this->faker->text;
        $email = $this->faker->safeEmail;
        $phone = $this->faker->phoneNumber;
        $website_link = $this->faker->word;
        $image = $this->faker->word;
        $address = $this->faker->text;
        $status = $this->faker->numberBetween(-8, 8);

        $response = $this->put(route('people-list.update', $peopleList), [
            'people_id' => $people_id,
            'name' => $name,
            'designation' => $designation,
            'department' => $department,
            'bio' => $bio,
            'email' => $email,
            'phone' => $phone,
            'website_link' => $website_link,
            'image' => $image,
            'address' => $address,
            'status' => $status,
        ]);

        $peopleList->refresh();

        $response->assertRedirect(route('peopleList.index'));
        $response->assertSessionHas('peopleList.id', $peopleList->id);

        $this->assertEquals($people_id, $peopleList->people_id);
        $this->assertEquals($name, $peopleList->name);
        $this->assertEquals($designation, $peopleList->designation);
        $this->assertEquals($department, $peopleList->department);
        $this->assertEquals($bio, $peopleList->bio);
        $this->assertEquals($email, $peopleList->email);
        $this->assertEquals($phone, $peopleList->phone);
        $this->assertEquals($website_link, $peopleList->website_link);
        $this->assertEquals($image, $peopleList->image);
        $this->assertEquals($address, $peopleList->address);
        $this->assertEquals($status, $peopleList->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $peopleList = PeopleList::factory()->create();

        $response = $this->delete(route('people-list.destroy', $peopleList));

        $response->assertRedirect(route('peopleList.index'));

        $this->assertDeleted($peopleList);
    }
}
