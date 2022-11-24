<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('bmi');
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
        //untuk menghitung bmi
        // dd($request);
        $a = new konsul($request->berat, $request->tinggi);
        $b = new nama($request->nama);
        $c = new hobi($request->hobi);
        $d = new tahun($request->tahun);
        $data = [
            'nama' => $b->nama(),
            'hobi' => $c->hobi(),
            'bmi' => $a->bmi(),
            'obes' => $a->obes(),
            'tahun' => $d->tahun()
        ];

        return view('bmi', compact('data'));
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
}

class nama
{
    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    public function nama()
    {
        return $this->nama;
    }
}

class hobi
{
    public function __construct($hobi)
    {
        $this->hobi = $hobi;
    }

    public function hobi()
    {
        return $this->hobi;
    }
}

class tahun
{
    public function __construct($tahun)
    {
        $this->tahun = $tahun;
        $this->tahun2 = 2022;
        $this->tahun3 = date('Y',strtotime($tahun));
        // dd($this->tahun3);
    }

    public function tahun()
    {
        // $tahun1=($this->tahun);
        // $tahun2 = date('Y',strtotime($tahun1));
        // $tahun3 = $this->tahun2;
        // dd($tahun2);
        return $this->tahun2 - $this->tahun3;
    }
}

class hitung
{
    public function __construct($berat, $tinggi)
    {
        $this->berat = $berat;
        $this->tinggi = $tinggi / 100;
    }

    public function bmi()
    {
        return $this->berat / ($this->tinggi * $this->tinggi);
    }
}

class konsul extends hitung
{
    public function obes()
    {
        $dbmi = $this->bmi();

        if ($dbmi < 18) {
            return 'kurus';
        } elseif ($dbmi > 30) {
            return 'obesitas';
        } else {
            return 'tidak terdaftar';
        }
    }
}