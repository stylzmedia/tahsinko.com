<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Research;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ResearchController
 */
class ResearchControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $research = Research::factory()->count(3)->create();

        $response = $this->get(route('research.index'));

        $response->assertOk();
        $response->assertViewIs('research.index');
        $response->assertViewHas('research');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('research.create'));

        $response->assertOk();
        $response->assertViewIs('research.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ResearchController::class,
            'store',
            \App\Http\Requests\ResearchStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $sub_title = $this->faker->word;
        $description = $this->faker->text;
        $image = $this->faker->word;
        $image_path = $this->faker->word;
        $media_id = $this->faker->numberBetween(-10000, 10000);
        $video = $this->faker->word;
        $pdf_file = $this->faker->word;

        $response = $this->post(route('research.store'), [
            'title' => $title,
            'sub_title' => $sub_title,
            'description' => $description,
            'image' => $image,
            'image_path' => $image_path,
            'media_id' => $media_id,
            'video' => $video,
            'pdf_file' => $pdf_file,
        ]);

        $research = Research::query()
            ->where('title', $title)
            ->where('sub_title', $sub_title)
            ->where('description', $description)
            ->where('image', $image)
            ->where('image_path', $image_path)
            ->where('media_id', $media_id)
            ->where('video', $video)
            ->where('pdf_file', $pdf_file)
            ->get();
        $this->assertCount(1, $research);
        $research = $research->first();

        $response->assertRedirect(route('research.index'));
        $response->assertSessionHas('research.id', $research->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $research = Research::factory()->create();

        $response = $this->get(route('research.show', $research));

        $response->assertOk();
        $response->assertViewIs('research.show');
        $response->assertViewHas('research');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $research = Research::factory()->create();

        $response = $this->get(route('research.edit', $research));

        $response->assertOk();
        $response->assertViewIs('research.edit');
        $response->assertViewHas('research');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ResearchController::class,
            'update',
            \App\Http\Requests\ResearchUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $research = Research::factory()->create();
        $title = $this->faker->sentence(4);
        $sub_title = $this->faker->word;
        $description = $this->faker->text;
        $image = $this->faker->word;
        $image_path = $this->faker->word;
        $media_id = $this->faker->numberBetween(-10000, 10000);
        $video = $this->faker->word;
        $pdf_file = $this->faker->word;

        $response = $this->put(route('research.update', $research), [
            'title' => $title,
            'sub_title' => $sub_title,
            'description' => $description,
            'image' => $image,
            'image_path' => $image_path,
            'media_id' => $media_id,
            'video' => $video,
            'pdf_file' => $pdf_file,
        ]);

        $research->refresh();

        $response->assertRedirect(route('research.index'));
        $response->assertSessionHas('research.id', $research->id);

        $this->assertEquals($title, $research->title);
        $this->assertEquals($sub_title, $research->sub_title);
        $this->assertEquals($description, $research->description);
        $this->assertEquals($image, $research->image);
        $this->assertEquals($image_path, $research->image_path);
        $this->assertEquals($media_id, $research->media_id);
        $this->assertEquals($video, $research->video);
        $this->assertEquals($pdf_file, $research->pdf_file);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $research = Research::factory()->create();

        $response = $this->delete(route('research.destroy', $research));

        $response->assertRedirect(route('research.index'));

        $this->assertDeleted($research);
    }
}
