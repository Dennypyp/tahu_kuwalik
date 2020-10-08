<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\Pesan;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesan = Pesan::all();
        return view("admin.pesan.index", ['pesan' => $pesan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pesan.create");
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
            // 'id' => 'required',
            'email' => "required",
            'nama' => 'required',
            'alamat' => 'required',
            'varian' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'catatan' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:1024|required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $pesan = new pesan();
            // $pesan->id = $request->get('id');
            $pesan->email = $request->get('email');
            $pesan->nama = $request->get('nama');
            $pesan->alamat = $request->get('alamat');
            $pesan->varian = $request->get('varian');
            $pesan->jumlah = $request->get('jumlah');
            $pesan->total = $request->get('total');
            $pesan->catatan = $request->get('catatan');
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $filename = time() . '.' . $img->getClientOriginalExtension();
                Storage::putFileAs("public/images/pesan", $img, $filename);
            }
            $pesan->image = $filename;
            $pesan->status = $request->get('status');
            $pesan->save();
            return redirect()->route('pesan.index');
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
        $pesan = Pesan::find($id);
        return view('admin.pesan.edit', ['pesan' => $pesan]);
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
            'email' => "required",
            'nama' => 'required',
            'alamat' => 'required',
            'varian' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'catatan' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:1024|required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $pesan = Pesan::find($id);
            $pesan->email = $request->get('email');
            $pesan->nama = $request->get('nama');
            $pesan->alamat = $request->get('alamat');
            $pesan->varian = $request->get('varian');
            $pesan->jumlah = $request->get('jumlah');
            $pesan->total = $request->get('total');
            $pesan->catatan = $request->get('catatan');
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                Storage::delete("public/images/pesan/" . $pesan->image);
                $filename = time() . '.' . $img->getClientOriginalExtension();
                Storage::putFileAs("public/images/pesan", $img, $filename);
                $pesan->image = $filename;
            }
            $pesan->status = $request->get('status');
            $pesan->save();
            return redirect()->route('pesan.index');
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

        $pesan = Pesan::find($id);
        Storage::delete("public/images/pesan/" . $pesan->image);
        $pesan->delete();

        if ($pesan->delete()) {
            echo "success";
        }
    }
}
