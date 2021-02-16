<?php

namespace Tests\Feature\Dish;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AllDishesTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_making_an_api_all()
    {
        $this->withoutExceptionHandling();

        $dish =[
            'plate' => 'Patacones',
            'price' => 2,
            'description' => 'Ricos patacones',
            'image'=> 'Patacones.jpg',
        ];

        $this->postJson('/api/dishes', $dish);

        $response = $this->getJson('/api/dishes');

        $response
            ->assertStatus(200); 
    }
}
