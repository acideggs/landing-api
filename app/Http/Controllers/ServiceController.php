<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model Line
Use App\Models\Service;

// Request Line
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        // Checking if Service table is not empty and return 404 if not found
        if (empty($services[0])) {
            return response()->json([
                'data'      =>  "No one service has created",
                'status'    =>  "Not Success"
            ], 404);
        }

        return response()->json([
            'data'      => $services,
            'status'    => "Success"
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service = Service::create([
            'title'  =>  $request->title,
            'description'  =>  $request->description,
            'image_url'  =>  $request->image_url,
        ]);

        return response()->json([
            'data'      =>  $service,
            'status'    =>  "Service Was Added"
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);

        // Checking if service was exist and return 404 if not found
        if (empty($service)) {
            return response()->json([
                'data'      =>  "Service Not Found",
                'status'    =>  "Not Success"
            ], 404);
        }

        return response()->json([
            'data'      =>  $service,
            'status'    =>  "Success"
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $service = Service::find($id);

        // Checking if service was exist and return 404 if not found
        if (empty($service)) {
            return response()->json([
                'data'      =>  "Service Not Found",
                'status'    =>  "Not Success"
            ], 404);
        }

        $servic->update([
            'title'  =>  $request->title,
            'description'  =>  $request->description,
            'image_url'  =>  $request->image_url,
        ]);

        return response()->json([
            'data'      =>  $service,
            'status'    =>  "Service was Updated"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        // Checking if service was exist and return 404 if not found
        if (empty($service)) {
            return response()->json([
                'data'      =>  "Service Not Found",
                'status'    =>  "Not Success"
            ], 404);
        }

        $service->delete();

        return response()->json([
            'data'      =>  $service,
            'status'    =>  "Service was Deleted"
        ], 200);
    }
}
