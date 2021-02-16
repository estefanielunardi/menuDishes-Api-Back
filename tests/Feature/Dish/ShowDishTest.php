<?php

namespace Tests\Feature\Dish;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowDishTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_making_an_api_show()
    {
        $this->withoutExceptionHandling();

        $dish =[
            'plate' => 'Patacones',
            'price' => 2,
            'description' => 'Ricos patacones',
            'image'=> 'Patacones.jpg',
            'id'=>1,
        ];

        $this->postJson('/api/dishes', $dish);

        $response = $this->getJson('/api/dishes/1', $dish);

        $response
            ->assertStatus(200)
            ->assertJson($dish);     
    }
}
