<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model Line
Use App\Models\WhyUs;

// Request Line
use App\Http\Requests\WhyUsRequest;

class WhyUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whyus = WhyUs::all();

        // Checking if whyus table is not empty and return 404 if not found
        if (empty($whyus[0])) {
            return response()->json([
                'data'      =>  "No one whyus has created",
                'status'    =>  "Not Success"
            ], 404);
        }

        return response()->json([
            'data'      => $whyus,
            'status'    => "Success"
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WhyUsRequest $request)
    {
        $whyus = WhyUs::create([
            'title'  =>  $request->title,
            'description'  =>  $request->description,
            'material_icon_name'  =>  $request->material_icon_name
        ]);

        return response()->json([
            'data'      =>  $whyus,
            'status'    =>  "Why Us Was Added"
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
        $whyus = WhyUs::find($id);

        // Checking if whyus was exist and return 404 if not found
        if (empty($whyus)) {
            return response()->json([
                'data'      =>  "whyus Not Found",
                'status'    =>  "Not Success"
            ], 404);
        }

        return response()->json([
            'data'      =>  $whyus,
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
    public function update(WhyUsRequest $request, $id)
    {
        $whyus = WhyUs::find($id);

        // Checking if whyus was exist and return 404 if not found
        if (empty($whyus)) {
            return response()->json([
                'data'      =>  "Why Us Not Found",
                'status'    =>  "Not Success"
            ], 404);
        }

        $whyus->update([
            'title'  =>  $request->title,
            'description'  =>  $request->description,
            'material_icon_name'  =>  $request->material_icon_name
        ]);

        return response()->json([
            'data'      =>  $whyus,
            'status'    =>  "Why Us was Updated"
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
        $whyus = WhyUs::find($id);

        // Checking if whyus was exist and return 404 if not found
        if (empty($whyus)) {
            return response()->json([
                'data'      =>  "Why Us Not Found",
                'status'    =>  "Not Success"
            ], 404);
        }

        $whyus->delete();

        return response()->json([
            'data'      =>  $whyus,
            'status'    =>  "Why Us was Deleted"
        ], 200);
    }
}
