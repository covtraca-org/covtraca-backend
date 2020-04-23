<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Device;

class DeviceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_device()
    {
        $device = factory(Device::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/devices', $device
        );

        $this->assertApiResponse($device);
    }

    /**
     * @test
     */
    public function test_read_device()
    {
        $device = factory(Device::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/devices/'.$device->id
        );

        $this->assertApiResponse($device->toArray());
    }

    /**
     * @test
     */
    public function test_update_device()
    {
        $device = factory(Device::class)->create();
        $editedDevice = factory(Device::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/devices/'.$device->id,
            $editedDevice
        );

        $this->assertApiResponse($editedDevice);
    }

    /**
     * @test
     */
    public function test_delete_device()
    {
        $device = factory(Device::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/devices/'.$device->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/devices/'.$device->id
        );

        $this->response->assertStatus(404);
    }
}
