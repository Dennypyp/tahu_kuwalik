<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Carousel;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cr = Carousel::all();
        return view("admin.carousel.index", ['cr' => $cr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.carousel.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'image' => 'image|mimes:jpeg,png,jpg|max:1024|required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $cr = new Carousel();
            if ($request->hasFile("image")) {
                $img = $request->file('image');
                $filename = time() . '.' . $img->getClientOriginalExtension();
                Storage::putFileAs("public/images/carousel", $img, $filename);
            }
            $cr->image = $filename;
            $cr->save();
            return redirect()->route('carousel.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cr = Carousel::find($id);
        return view("admin.carousel.edit", ['cr' => $cr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $cr = Carousel::find($id);
            if ($request->hasFile("image")) {
                $img = $request->file('image');
                Storage::delete("public/images/carousel/" . $cr->image);
                $filename = time() . '.' . $img->getClientOriginalExtension();
                Storage::putFileAs("public/images/carousel", $img, $filename);
                $cr->image = $filename;
                $cr->save();
            }
            return redirect()->route('carousel.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cr = Carousel::find($id);
        Storage::delete("public/images/carousel/" . $cr->image);
        $cr->delete();

        if ($cr->delete()) {
            echo "success";
        }
    }
}
