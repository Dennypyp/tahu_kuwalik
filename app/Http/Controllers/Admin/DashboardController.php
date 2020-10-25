<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pesan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $lunas = Pesan::where("status", "Lunas")->count();
        $belum = Pesan::where("status", "belum lunas")->count();
        $jual = Pesan::select("jumlah", "created_at")->get()->groupby(function ($data) {
            return Carbon::parse($data->created_at)->format("m");
        });
        return view("admin.index", ["Lunas" => $lunas, "belumlunas" => $belum, "jual" => $jual]);
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
        //
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
        //
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

    public function chartku()
    {
        $pesan = DB::table('pesans')->select(DB::raw('sum(jumlah) as `data`'),DB::raw("MONTH(created_at) as month"))
        ->where("status", "Lunas")
        ->groupby('month')
        ->get();
        $data["pesan"] = $pesan;

        return response()->json($data);
    }
}
