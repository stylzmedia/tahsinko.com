<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PortfolioController
 */
class PortfolioControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $portfolios = Portfolio::factory()->count(3)->create();

        $response = $this->get(route('portfolio.index'));

        $response->assertOk();
        $response->assertViewIs('portfolio.index');
        $response->assertViewHas('portfolios');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('portfolio.create'));

        $response->assertOk();
        $response->assertViewIs('portfolio.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PortfolioController::class,
            'store',
            \App\Http\Requests\PortfolioStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $media_id = $this->faker->numberBetween(-100000, 100000);
        $title = $this->faker->sentence(4);
        $description = $this->faker->text;
        $image = $this->faker->word;

        $response = $this->post(route('portfolio.store'), [
            'product_id' => $product_id,
            'media_id' => $media_id,
            'title' => $title,
            'description' => $description,
            'image' => $image,
        ]);

        $portfolios = Portfolio::query()
            ->where('product_id', $product_id)
            ->where('media_id', $media_id)
            ->where('title', $title)
            ->where('description', $description)
            ->where('image', $image)
            ->get();
        $this->assertCount(1, $portfolios);
        $portfolio = $portfolios->first();

        $response->assertRedirect(route('portfolio.index'));
        $response->assertSessionHas('portfolio.id', $portfolio->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $portfolio = Portfolio::factory()->create();

        $response = $this->get(route('portfolio.show', $portfolio));

        $response->assertOk();
        $response->assertViewIs('portfolio.show');
        $response->assertViewHas('portfolio');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $portfolio = Portfolio::factory()->create();

        $response = $this->get(route('portfolio.edit', $portfolio));

        $response->assertOk();
        $response->assertViewIs('portfolio.edit');
        $response->assertViewHas('portfolio');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PortfolioController::class,
            'update',
            \App\Http\Requests\PortfolioUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $portfolio = Portfolio::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $media_id = $this->faker->numberBetween(-100000, 100000);
        $title = $this->faker->sentence(4);
        $description = $this->faker->text;
        $image = $this->faker->word;

        $response = $this->put(route('portfolio.update', $portfolio), [
            'product_id' => $product_id,
            'media_id' => $media_id,
            'title' => $title,
            'description' => $description,
            'image' => $image,
        ]);

        $portfolio->refresh();

        $response->assertRedirect(route('portfolio.index'));
        $response->assertSessionHas('portfolio.id', $portfolio->id);

        $this->assertEquals($product_id, $portfolio->product_id);
        $this->assertEquals($media_id, $portfolio->media_id);
        $this->assertEquals($title, $portfolio->title);
        $this->assertEquals($description, $portfolio->description);
        $this->assertEquals($image, $portfolio->image);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $portfolio = Portfolio::factory()->create();

        $response = $this->delete(route('portfolio.destroy', $portfolio));

        $response->assertRedirect(route('portfolio.index'));

        $this->assertDeleted($portfolio);
    }
}
