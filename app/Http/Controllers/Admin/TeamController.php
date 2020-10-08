<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use App\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::all();
        return view("admin.team.index", ['team' => $team]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.team.create");
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
            'name' => 'required',
            'status' => "required",
            'image' => 'image|mimes:jpeg,png,jpg|max:1024|required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $team = new Team();
            $team->name = $request->get('name');

            $team->status = $request->get('status');
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $filename = time() . '.' . $img->getClientOriginalExtension();
                Storage::putFileAs("public/images/team", $img, $filename);
            }
            $team->image = $filename;
            $team->save();
            return redirect()->route('team.index');
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
        $team = Team::find($id);
        return view("admin.team.edit", ['team' => $team]);
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
            'name' => 'required',
            'status' => "required",
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $team = Team::find($id);
            $team->name = $request->get('name');
            $team->status = $request->get('status');
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                Storage::delete("public/images/team/" . $team->image);
                $filename = time() . '.' . $img->getClientOriginalExtension();
                Storage::putFileAs("public/images/team", $img, $filename);
                $team->image = $filename;
            }

            $team->save();
            return redirect()->route('team.index');
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
        $team = Team::find($id);
        Storage::delete("public/images/team/" . $team->image);
        $team->delete();
        if ($team->delete()) {
            echo "success";
        }
    }
}
