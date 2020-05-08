<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDeviceAPIRequest;
use App\Http\Requests\API\UpdateDeviceAPIRequest;
use App\Models\Device;
use App\Repositories\DeviceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DeviceController
 * @package App\Http\Controllers\API
 */

class DeviceAPIController extends AppBaseController
{
    /** @var  DeviceRepository */
    private $deviceRepository;

    public function __construct(DeviceRepository $deviceRepo)
    {
        $this->deviceRepository = $deviceRepo;
    }

    /**
     * Display a listing of the Device.
     * GET|HEAD /devices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $devices = $this->deviceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($devices->toArray(), 'Devices retrieved successfully');
    }

    /**
     * Store a newly created Device in storage.
     * POST /devices
     *
     * @param CreateDeviceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDeviceAPIRequest $request)
    {
        $input = $request->all();

        $device = $this->deviceRepository->create($input);

        return $this->sendResponse($device->toArray(), 'Device saved successfully');
    }

    /**
     * Display the specified Device.
     * GET|HEAD /devices/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Device $device */
        $device = $this->deviceRepository->find($id);

        if (empty($device)) {
            return $this->sendError('Device not found');
        }

        return $this->sendResponse($device->toArray(), 'Device retrieved successfully');
    }

    /**
     * Update the specified Device in storage.
     * PUT/PATCH /devices/{id}
     *
     * @param int $id
     * @param UpdateDeviceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeviceAPIRequest $request)
    {
        $input = $request->all();

        /** @var Device $device */
        $device = $this->deviceRepository->find($id);

        if (empty($device)) {
            return $this->sendError('Device not found');
        }

        $device = $this->deviceRepository->update($input, $id);

        return $this->sendResponse($device->toArray(), 'Device updated successfully');
    }

    /**
     * Remove the specified Device from storage.
     * DELETE /devices/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Device $device */
        $device = $this->deviceRepository->find($id);

        if (empty($device)) {
            return $this->sendError('Device not found');
        }

        $device->delete();

        return $this->sendSuccess('Device deleted successfully');
    }

    /**
     * Display the specified UIDDevice.
     * GET|HEAD /devices/{uid}
     *
     * @param int $uid
     *
     * @return Response
     */
    public function getUID($uid)
    {
        $device = Device::where('uid', '=', $uid)->first();        

        if (empty($device)) {
            return $this->sendError('Device UID not found');
        }

        return $this->sendResponse($device->toArray(), 'Device retrieved successfully');
    }
}
