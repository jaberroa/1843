<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_renders_real_navigation_and_form(): void
    {
        $this->get('/')->assertOk()->assertSee('La lógica de', false)->assertSee('name="consent"', false)->assertSee('SECUENCIA ILUSTRATIVA');
    }

    public function test_valid_request_is_persisted(): void
    {
        $this->post('/contacto', $this->validData())->assertRedirect(route('home').'#contacto')->assertSessionHas('contact_success');
        $this->assertDatabaseHas('contact_requests', ['email' => 'test@example.com', 'interest' => 'AGPOS']);
    }

    public function test_invalid_request_is_not_saved(): void
    {
        $this->post('/contacto', ['name' => 'Test', 'email' => 'invalid'])->assertSessionHasErrors(['email', 'message', 'consent', 'interest']);
        $this->assertDatabaseCount('contact_requests', 0);
    }

    public function test_honeypot_is_rejected(): void
    {
        $this->post('/contacto', array_merge($this->validData(), ['website' => 'spam']))->assertSessionHasErrors('website');
        $this->assertDatabaseCount('contact_requests', 0);
    }

    public function test_database_failure_does_not_claim_success(): void
    {
        DB::shouldReceive('table')->with('contact_requests')->once()->andThrow(new \RuntimeException('Unavailable'));
        $this->from('/')->post('/contacto', $this->validData())->assertRedirect(route('home').'#contacto')->assertSessionHasErrors('contact')->assertSessionMissing('contact_success');
    }

    private function validData(): array
    {
        return ['name' => 'Prueba', 'email' => 'test@example.com', 'interest' => 'AGPOS', 'message' => 'Necesitamos conocer la solución para nuestro negocio.', 'consent' => '1', 'website' => ''];
    }
}

