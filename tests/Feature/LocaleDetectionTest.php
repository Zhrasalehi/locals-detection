<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class LocaleDetectionTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this
            ->withHeaders([
                'Accept-Language' => 'es',
            ])
            ->postJson('/api/profile', [
                'email' => 'invalid.email',
            ]);
        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonPath('errors.email', ['correo electrónico no es un correo válido'])
            ->assertJsonPath('errors.name', ['El campo nombre es obligatorio.']);

    }
}
