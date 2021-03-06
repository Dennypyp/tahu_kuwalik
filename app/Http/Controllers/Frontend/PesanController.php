<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Pesan;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pesan = Pesan::all();
        return view("frontend.about.index", ['pesan' => $pesan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
            // 'varian1' => 'required',
            // 'varian2' => 'required',
            // 'varian3' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'catatan' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg|max:1024|required',
            // 'status' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            if(Auth::user()){
                $pesan = new pesan();
                $user = Auth::user();
                $pesan->email = $user->email;
                $pesan->nama = $user->name;
                $pesan->alamat = $request->get('alamat');
                $varian = array(
                    'varian1' => $request->get('varian1'),
                    'varian2' => $request->get('varian2'),
                    'varian3' => $request->get('varian3'),
                    'varian4' => $request->get('varian4'),
                );
                $pesan->varian = json_encode($varian);
                $pesan->jumlah = $request->get('jumlah');
                $pesan->total = $request->get('total');
                $pesan->catatan = $request->get('catatan');

            }else{
                $pesan = new pesan();
                $pesan->email = $request->get('email');
                $pesan->nama = $request->get('nama');
                $pesan->alamat = $request->get('alamat');
                $varian = array(
                    'varian1' => $request->get('varian1'),
                    'varian2' => $request->get('varian2'),
                    'varian3' => $request->get('varian3'),
                    'varian4' => $request->get('varian4'),
                );
                $pesan->varian = json_encode($varian);
                $pesan->jumlah = $request->get('jumlah');
                $pesan->total = $request->get('total');
                $pesan->catatan = $request->get('catatan');
            }
            $pesan->status = "belum lunas";
            $pesan->save();

            if(Auth::user()){
                return redirect('/about-us');
            }else{
                return redirect('/register');
            }

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
        //
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
            'image' => 'image|mimes:jpeg,png,jpg|max:1024|required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        else{
            $pesan = Pesan::findOrfail($id);
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $filename = time() . '.' . $img->getClientOriginalExtension();
                Storage::putFileAs("public/images/pesan", $img, $filename);
            }
            $pesan->image = $filename;
            $pesan->save();
            return redirect('about-us');
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
        //
    }
}
