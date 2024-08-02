<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessRequest;
use App\Models\SeenSerialNumber;
use App\Models\Device;

class ApiAccessController extends Controller
{
    public function getAccessRequests(Request $request)
    {
        return response()->json(AccessRequest::all());
    }

    public function getSeenSerialNumbers(Request $request)
    {
        return response()->json(SeenSerialNumber::all());
    }

    public function getDevices(Request $request)
    {
        return response()->json(Device::all());
    }

    public function createDeviceForm(Request $request)
    {
        $seenSerialNumbers = SeenSerialNumber::all();
        $form = view('device.form', compact('seenSerialNumbers'))->render();
        return response($form);
    }

    public function storeDevice(Request $request)
    {
        $data = $request->all();
        $device = Device::create([
            'name' => $data['device_name'],
            'serial_number' => $data['serial_number']
        ]);
        return response()->json($device);
    }

    public function getUpdates(Request $request)
    {
        $serial_number = $request->query('serial_number');
        SeenSerialNumber::updateOrCreate(
            ['serial_number' => $serial_number],
            ['seen_at' => now()]
        );
        return response()->json(
            AccessRequest::where('serial_number', $serial_number)
                ->where('action_name', 'open')
                ->where('action_status', 'pending')
                ->get()
        );
    }

    public function sendUpdate(Request $request)
    {
        $data = $request->all();
        AccessRequest::where('id', $data['action_id'])
            ->update(['action_status' => $data['status']]);
        return response()->json([]);
    }

    public function getAccessRequestsBySerial(Request $request)
    {
        $serial_number = $request->query('serial_number');
        return response()->json(
            AccessRequest::where('serial_number', $serial_number)
                ->where('action_name', 'open')
                ->where('action_status', 'pending')
                ->get()
        );
    }

    public function sendAccessRequest(Request $request)
    {
        //post method
        $data = $request->all();
        $device = Device::find($data['device_id']);
        $accessRequest = AccessRequest::create([
            'serial_number' => $device->serial_number,
            'action_name' => 'open',
            'action_status' => 'pending'
        ]);
        return response()->json($accessRequest);
    }

    

}
