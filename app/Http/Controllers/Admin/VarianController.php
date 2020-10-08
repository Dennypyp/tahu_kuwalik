<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Varian;

class VarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Varian::all();
        return view("admin.varian.index", ['portfolio' => $portfolio]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.varian.create");
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
            'title' => 'required',
            'harga' => 'required',
            'description' => "required",
            'image' => 'image|mimes:jpeg,png,jpg|max:1024|required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $portfolio = new varian();
            $portfolio->title = $request->get('title');
            $portfolio->harga = $request->get('harga');
            $portfolio->description = $request->get('description');
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $filename = time() . '.' . $img->getClientOriginalExtension();
                Storage::putFileAs("public/images/portfolio", $img, $filename);
            }
            $portfolio->image = $filename;
            $portfolio->save();
            return redirect()->route('varian.index');
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
        $portfolio = Varian::find($id);
        return view('admin.varian.edit', ['portfolio' => $portfolio]);
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
            'title' => 'required',
            'description' => "required",
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $portfolio = Varian::find($id);
            $portfolio->title = $request->get('title');
            
            $portfolio->description = $request->get('description');
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                Storage::delete("public/images/portfolio/" . $portfolio->image);
                $filename = time() . '.' . $img->getClientOriginalExtension();
                Storage::putFileAs("public/images/portfolio", $img, $filename);
                $portfolio->image = $filename;
            }
            $portfolio->save();
            return redirect()->route('varian.index');
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

        $portfolio = Varian::find($id);
        Storage::delete("public/images/portfolio/" . $portfolio->image);
        $portfolio->delete();

        if ($portfolio->delete()) {
            echo "success";
        }
    }
}
