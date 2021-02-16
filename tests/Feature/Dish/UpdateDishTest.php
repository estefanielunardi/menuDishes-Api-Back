<?php

namespace Tests\Feature\Dish;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateDishTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_making_an_api_update()
    {
        $this->withoutExceptionHandling();

        $dish =[
            'plate' => 'Patacones',
            'price' => 2,
            'description' => 'Ricos patacones',
            'image'=> 'Patacones.jpg',
            'id'=>1,
        ];

        $this->postJson('/api/dishes/', $dish);

        $dishUpdate =[
                'plate' => 'Arroz',
                'price' => 4,
                'description' => 'Rico Arroz',
                'image'=> 'Arroz.jpg',
                'id'=>1,
            ];

        $response = $this->putJson('/api/dishes/1', $dishUpdate);
        
        $response
            ->assertStatus(200)
            ->assertJsonFragment($dishUpdate);

            $this->assertDatabaseHas('dishes', $dishUpdate);
    }
}
