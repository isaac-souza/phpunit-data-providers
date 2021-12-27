<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class CustomersTest extends TestCase
{
    use RefreshDatabase;

    public function test_first_name_field_is_required()
    {
        // Arrange
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Act
        $this->actingAs($user);
        $this->get(route('customers.create'));

        $response = $this->post('/customers', [
            'first_name' => null,
            'last_name' => 'Souza',
            'email' => 'me@isaacsouza.dev',
            'display_currency' => 'BRL',
            'mobile_phone' => '98983448902',
        ]);

        // Assert
        $response->assertRedirect(route('customers.create'));
        $this->assertDatabaseCount('customers', 0);
    }

    public function test_last_name_field_is_required()
    {
        // Arrange
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Act
        $this->actingAs($user);
        $this->get(route('customers.create'));

        $response = $this->post('/customers', [
            'first_name' => 'Isaac',
            'last_name' => null,
            'email' => 'me@isaacsouza.dev',
            'display_currency' => 'BRL',
            'mobile_phone' => '98983448902',
        ]);
    
        // Assert
        $response->assertRedirect(route('customers.create'));
        $this->assertDatabaseCount('customers', 0);
    }

    public function test_email_field_is_required()
    {
        // Arrange
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Act
        $this->actingAs($user);
        $this->get(route('customers.create'));

        $response = $this->post('/customers', [
            'first_name' => 'Isaac',
            'last_name' => 'Souza',
            'email' => null,
            'display_currency' => 'BRL',
            'mobile_phone' => '98983448902',
        ]);
    
        // Assert
        $response->assertRedirect(route('customers.create'));
        $this->assertDatabaseCount('customers', 0);
    }

    public function test_email_field_must_be_a_valid_email()
    {
        // Arrange
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Act
        $this->actingAs($user);
        $this->get(route('customers.create'));

        $response = $this->post('/customers', [
            'first_name' => 'Isaac',
            'last_name' => 'Souza',
            'email' => 'isaacsouza.dev',
            'display_currency' => 'BRL',
            'mobile_phone' => '98983448902',
        ]);
    
        // Assert
        $response->assertRedirect(route('customers.create'));
        $this->assertDatabaseCount('customers', 0);
    }

    public function test_display_currency_field_is_required()
    {
        // Arrange
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Act
        $this->actingAs($user);
        $this->get(route('customers.create'));

        $response = $this->post('/customers', [
            'first_name' => 'Isaac',
            'last_name' => 'Souza',
            'email' => 'me@isaacsouza.dev',
            'display_currency' => null,
            'mobile_phone' => '98983448902',
        ]);
        
        // Assert
        $response->assertRedirect(route('customers.create'));
        $this->assertDatabaseCount('customers', 0);
    }

    public function test_display_currency_field_must_have_3_characters()
    {
        // Arrange
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Act
        $this->actingAs($user);
        $this->get(route('customers.create'));

        $response = $this->post('/customers', [
            'first_name' => 'Isaac',
            'last_name' => 'Souza',
            'email' => 'me@isaacsouza.dev',
            'display_currency' => 'BR',
            'mobile_phone' => '98983448902',
        ]);
        
        // Assert
        $response->assertRedirect(route('customers.create'));
        $this->assertDatabaseCount('customers', 0);
    }

    public function test_mobile_phone_field_is_required()
    {
        // Arrange
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Act
        $this->actingAs($user);
        $this->get(route('customers.create'));

        $response = $this->post('/customers', [
            'first_name' => 'Isaac',
            'last_name' => 'Souza',
            'email' => 'me@isaacsouza.dev',
            'display_currency' => 'BRL',
            'mobile_phone' => null,
        ]);
        
        // Assert
        $response->assertRedirect(route('customers.create'));
        $this->assertDatabaseCount('customers', 0);
    }

    public function test_mobile_phone_field_must_have_11_characters()
    {
        // Arrange
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        // Act
        $this->actingAs($user);
        $this->get(route('customers.create'));

        $response = $this->post('/customers', [
            'first_name' => 'Isaac',
            'last_name' => 'Souza',
            'email' => 'me@isaacsouza.dev',
            'display_currency' => 'BRL',
            'mobile_phone' => '0',
        ]);
        
        // Assert
        $response->assertRedirect(route('customers.create'));
        $this->assertDatabaseCount('customers', 0);
    }
}
