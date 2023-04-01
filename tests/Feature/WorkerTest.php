<?php

namespace Tests\Feature;

use App\Models\Worker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WorkerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testWorkerIndex()
    {
        $workers = Worker::factory()->count(5)->create();
        $response = $this->get('/vehicle-management/api/workers');
        $response->assertStatus(200)
            ->assertJsonCount(5)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'vehicles'
                ]
            ]);
    }

    public function testWorkerShow()
    {
        $worker = Worker::factory()->create();
        $response = $this->get("/vehicle-management/api/workers/{$worker->id}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'vehicles'
            ]);
    }

    public function testWorkerStore()
    {
        $data = [
            'name' => $this->faker->name
        ];
        $response = $this->post('/vehicle-management/api/workers', $data);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'vehicles'
            ])
            ->assertJsonFragment($data);
    }

    public function testWorkerUpdate()
    {
        $worker = Worker::factory()->create();
        $data = [
            'name' => $this->faker->name
        ];
        $response = $this->put("/vehicle-management/api/workers/{$worker->id}", $data);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'vehicles'
            ])
            ->assertJsonFragment($data);
    }
}
