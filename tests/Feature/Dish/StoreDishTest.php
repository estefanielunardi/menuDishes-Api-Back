<?php

namespace Tests\Feature\Dish;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreDishTest extends TestCase
{
    Use RefreshDatabase;

    public function test_making_an_api_store()
    {  
        $this->withoutExceptionHandling();

        $dish =[
            'plate' => 'Patacones',
            'price' => 2,
            'description' => 'Ricos patacones',
            'image'=> 'Patacones.jpg',
        ];

        $response = $this->postJson('/api/dishes', $dish);

        $response
            ->assertStatus(201)
            ->assertJson($dish);
        $this->assertDatabaseHas('dishes', $dish);
    }
}
