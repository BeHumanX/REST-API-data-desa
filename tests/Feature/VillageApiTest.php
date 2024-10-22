<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VillageApiTest extends TestCase
{
    /**
     * A basic test example.
     */
    

    public function test_the_village_api_get_a_data(): void
    {
        $response = $this->get('/api/desa');

        $response->assertJsonStructure(['status', 'data', 'message']);
    }
    public function test_the_village_api_create_a_data(): void
    {
        $response = $this->post('/api/desa', ['code' => '123456', 'name' => 'Desa Test1', 'district_code' => '110101']);

        $response->assertJsonStructure(['status', 'message']);
    }
    public function test_the_village_api_update_a_data(): void
    {
        $response = $this->put('/api/desa/83812', ['code' => '123456', 'name' => 'Desa Test2', 'district_code' => '110101']);

        $response->assertJsonStructure(['status', 'message']);
    }
    public function test_the_village_api_delete_a_data(): void
    {
        $response = $this->delete('/api/desa/83812');

        $response->assertJsonStructure(['status', 'message']);
    }
}
