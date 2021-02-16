<?php

namespace Tests\Feature\Dish;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteDishTest extends TestCase
{
    Use RefreshDatabase;

    public function test_making_an_api_delete()
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

        $response = $this->deleteJson('/api/dishes/1');

        $response
            ->assertStatus(204);
        $this->assertDatabaseMissing('dishes', $dish);
    }
}
