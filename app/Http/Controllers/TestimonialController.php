<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model Line
Use App\Models\Testimonial;

// Request Line
use App\Http\Requests\TestimonialRequest;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        // Checking if testimonial table is not empty and return 404 if not found
        if (empty($testimonials[0])) {
            return response()->json([
                'data'      =>  "No one testimonial has created",
                'status'    =>  "Not Success"
            ], 404);
        }

        return response()->json([
            'data'      => $testimonials,
            'status'    => "Success"
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        $testimonial = Testimonial::create([
            'name'  =>  $request->name,
            'testimonial'  =>  $request->testimonial,
        ]);

        return response()->json([
            'data'      =>  $testimonial,
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
        $testimonial = Testimonial::find($id);

        // Checking if testimonial was exist and return 404 if not found
        if (empty($testimonial)) {
            return response()->json([
                'data'      =>  "Testimonial Not Found",
                'status'    =>  "Not Success"
            ], 404);
        }

        return response()->json([
            'data'      =>  $testimonial,
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
    public function update(TestimonialRequest $request, $id)
    {
        $testimonial = Testimonial::find($id);

        // Checking if testimonial was exist and return 404 if not found
        if (empty($testimonial)) {
            return response()->json([
                'data'      =>  "Testimonial Not Found",
                'status'    =>  "Not Success"
            ], 404);
        }

        $testimonial->update([
            'name'  =>  $request->name,
            'testimonial'  =>  $request->testimonial,
        ]);

        return response()->json([
            'data'      =>  $testimonial,
            'status'    =>  "Testimonial was Updated"
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
        $testimonial = Testimonial::find($id);

        // Checking if testimonial was exist and return 404 if not found
        if (empty($testimonial)) {
            return response()->json([
                'data'      =>  "Testimonial Not Found",
                'status'    =>  "Not Success"
            ], 404);
        }

        $testimonial->delete();

        return response()->json([
            'data'      =>  $testimonial,
            'status'    =>  "Testimonial was Deleted"
        ], 200);
    }
}
