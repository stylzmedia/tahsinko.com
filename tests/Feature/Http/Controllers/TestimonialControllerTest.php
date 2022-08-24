<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TestimonialController
 */
class TestimonialControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $testimonials = Testimonial::factory()->count(3)->create();

        $response = $this->get(route('testimonial.index'));

        $response->assertOk();
        $response->assertViewIs('testimonial.index');
        $response->assertViewHas('testimonials');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('testimonial.create'));

        $response->assertOk();
        $response->assertViewIs('testimonial.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TestimonialController::class,
            'store',
            \App\Http\Requests\TestimonialStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $email = $this->faker->safeEmail;
        $status = $this->faker->numberBetween(-8, 8);
        $position = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('testimonial.store'), [
            'name' => $name,
            'email' => $email,
            'status' => $status,
            'position' => $position,
        ]);

        $testimonials = Testimonial::query()
            ->where('name', $name)
            ->where('email', $email)
            ->where('status', $status)
            ->where('position', $position)
            ->get();
        $this->assertCount(1, $testimonials);
        $testimonial = $testimonials->first();

        $response->assertRedirect(route('testimonial.index'));
        $response->assertSessionHas('testimonial.id', $testimonial->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $testimonial = Testimonial::factory()->create();

        $response = $this->get(route('testimonial.show', $testimonial));

        $response->assertOk();
        $response->assertViewIs('testimonial.show');
        $response->assertViewHas('testimonial');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $testimonial = Testimonial::factory()->create();

        $response = $this->get(route('testimonial.edit', $testimonial));

        $response->assertOk();
        $response->assertViewIs('testimonial.edit');
        $response->assertViewHas('testimonial');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TestimonialController::class,
            'update',
            \App\Http\Requests\TestimonialUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $testimonial = Testimonial::factory()->create();
        $name = $this->faker->name;
        $email = $this->faker->safeEmail;
        $status = $this->faker->numberBetween(-8, 8);
        $position = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('testimonial.update', $testimonial), [
            'name' => $name,
            'email' => $email,
            'status' => $status,
            'position' => $position,
        ]);

        $testimonial->refresh();

        $response->assertRedirect(route('testimonial.index'));
        $response->assertSessionHas('testimonial.id', $testimonial->id);

        $this->assertEquals($name, $testimonial->name);
        $this->assertEquals($email, $testimonial->email);
        $this->assertEquals($status, $testimonial->status);
        $this->assertEquals($position, $testimonial->position);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $testimonial = Testimonial::factory()->create();

        $response = $this->delete(route('testimonial.destroy', $testimonial));

        $response->assertRedirect(route('testimonial.index'));

        $this->assertDeleted($testimonial);
    }
}
