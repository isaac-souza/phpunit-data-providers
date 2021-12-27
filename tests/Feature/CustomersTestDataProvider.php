<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class CustomersTestDataProvider extends TestCase
{
    use RefreshDatabase;

    /**
     * @dataProvider customerFormData
     */
    public function test_customers_validation_rules($first_name, $last_name, $email, $display_currency, $mobile_phone)
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        $this->actingAs($user);
        $this->get(route('customers.create'));

        $response = $this->post('/customers', [
            'first_name'        => $first_name,
            'last_name'         => $last_name,
            'email'             => $email,
            'display_currency'  => $display_currency,
            'mobile_phone'      => $mobile_phone,
        ]);
        
        $response->assertRedirect(route('customers.create'));
        $this->assertDatabaseCount('customers', 0);
    }

    public static function customerFormData()
    {
        return [
            'first name field is required' => [
                'first_name' => null,
                'last_name' => 'Souza',
                'email' => 'me@isaacsouza.dev',
                'display_currency' => 'BRL',
                'mobile_phone' => '98983448902',
            ],
            'last name field is required' => [
                'first_name' => 'Isaac',
                'last_name' => null,
                'email' => 'me@isaacsouza.dev',
                'display_currency' => 'BRL',
                'mobile_phone' => '98983448902',
            ],
            'test email field is required' => [
                'first_name' => 'Isaac',
                'last_name' => 'Souza',
                'email' => null,
                'display_currency' => 'BRL',
                'mobile_phone' => '98983448902',
            ],
            'email field must be a valid email' => [
                'first_name' => 'Isaac',
                'last_name' => 'Souza',
                'email' => 'isaacsouza.dev',
                'display_currency' => 'BRL',
                'mobile_phone' => '98983448902',
            ],
            'display currency field is required' => [
                'first_name' => 'Isaac',
                'last_name' => 'Souza',
                'email' => 'me@isaacsouza.dev',
                'display_currency' => null,
                'mobile_phone' => '98983448902',
            ],
            'display currency field is must have 3 exactly characters' => [
                'first_name' => 'Isaac',
                'last_name' => 'Souza',
                'email' => 'me@isaacsouza.dev',
                'display_currency' => 'BR',
                'mobile_phone' => '98983448902',
            ],
            'mobile phone field is required' => [
                'first_name' => 'Isaac',
                'last_name' => 'Souza',
                'email' => 'me@isaacsouza.dev',
                'display_currency' => 'BRL',
                'mobile_phone' => null,
            ],
            'mobile phone field must have 11 characters' => [
                'first_name' => 'Isaac',
                'last_name' => 'Souza',
                'email' => 'me@isaacsouza.dev',
                'display_currency' => 'BRL',
                'mobile_phone' => '0',
            ]
        ];
    }
}
