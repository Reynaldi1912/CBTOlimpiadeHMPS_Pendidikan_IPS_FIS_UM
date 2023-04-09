<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exam;
use App\Models\exam_attemp;
use Auth;

class UjianPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('peserta.ujianPeserta');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peserta.pengerjaanSoal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = exam::all()->where('token',$request->token)->first();
        if($token){
            $attemp_token = exam_attemp::all()->where('exam_id',$token->id)->first();
            if($attemp_token){
                if($attemp_token->total_attemp >= 3){
                    return redirect()->route('pengerjaan.index')->with('error','penggunaan token anda sudah melebhi 3x');;
                }
                $attemp_token->update([
                    'exam_id' => $token->id,
                    'total_attemp' => (int)$attemp_token->total_attemp + 1
                ]);
                return redirect()->route('pengerjaan.create');
            }else{
                exam_attemp::create([
                    'id_user' => Auth::user()->id,
                    'exam_id' => $token->id,
                    'total_attemp' => 1
                ]);
                return redirect()->route('pengerjaan.create');
            }
        }else{
            return redirect()->route('pengerjaan.index')->with('error','tidak ada ujian dengan token "'.$request->token.'"');;
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
