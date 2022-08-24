<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\RequestContact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RequestContactController
 */
class RequestContactControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $requestContacts = RequestContact::factory()->count(3)->create();

        $response = $this->get(route('request-contact.index'));

        $response->assertOk();
        $response->assertViewIs('requestContact.index');
        $response->assertViewHas('requestContacts');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('request-contact.create'));

        $response->assertOk();
        $response->assertViewIs('requestContact.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RequestContactController::class,
            'store',
            \App\Http\Requests\RequestContactStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $subject = $this->faker->word;
        $name = $this->faker->name;
        $email = $this->faker->safeEmail;
        $phone = $this->faker->phoneNumber;
        $message = $this->faker->text;

        $response = $this->post(route('request-contact.store'), [
            'subject' => $subject,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
        ]);

        $requestContacts = RequestContact::query()
            ->where('subject', $subject)
            ->where('name', $name)
            ->where('email', $email)
            ->where('phone', $phone)
            ->where('message', $message)
            ->get();
        $this->assertCount(1, $requestContacts);
        $requestContact = $requestContacts->first();

        $response->assertRedirect(route('requestContact.index'));
        $response->assertSessionHas('requestContact.id', $requestContact->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $requestContact = RequestContact::factory()->create();

        $response = $this->get(route('request-contact.show', $requestContact));

        $response->assertOk();
        $response->assertViewIs('requestContact.show');
        $response->assertViewHas('requestContact');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $requestContact = RequestContact::factory()->create();

        $response = $this->get(route('request-contact.edit', $requestContact));

        $response->assertOk();
        $response->assertViewIs('requestContact.edit');
        $response->assertViewHas('requestContact');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RequestContactController::class,
            'update',
            \App\Http\Requests\RequestContactUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $requestContact = RequestContact::factory()->create();
        $subject = $this->faker->word;
        $name = $this->faker->name;
        $email = $this->faker->safeEmail;
        $phone = $this->faker->phoneNumber;
        $message = $this->faker->text;

        $response = $this->put(route('request-contact.update', $requestContact), [
            'subject' => $subject,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
        ]);

        $requestContact->refresh();

        $response->assertRedirect(route('requestContact.index'));
        $response->assertSessionHas('requestContact.id', $requestContact->id);

        $this->assertEquals($subject, $requestContact->subject);
        $this->assertEquals($name, $requestContact->name);
        $this->assertEquals($email, $requestContact->email);
        $this->assertEquals($phone, $requestContact->phone);
        $this->assertEquals($message, $requestContact->message);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $requestContact = RequestContact::factory()->create();

        $response = $this->delete(route('request-contact.destroy', $requestContact));

        $response->assertRedirect(route('requestContact.index'));

        $this->assertDeleted($requestContact);
    }
}
