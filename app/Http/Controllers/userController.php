<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $data = User::all()->where('role','admin');
        return view('admin.kelolaAdmin' , ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = User::all()->where('role','peserta');
        return view('admin.kelolaPeserta' , ['data'=>$data]);
    }

    public function getUser($id){
        echo json_encode(User::all()->where('id',$id)->first());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->status == 'peserta'){
            user::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'role' => 'peserta',
                'password' => Hash::make($request->password),
            ]);
        }elseif($request->status == 'admin'){
            user::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'role' => 'admin',
                'password' => Hash::make($request->password),
            ]);
        }
        return back()->with('success' , 'Sukses Menambahkan Data');
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
        $status = $request->status;
        $user = User::all()->where('id',$id)->first();
        if($status == 'admin'){
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email
            ]);
        }elseif($status == 'peserta'){
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email
            ]);
        }
        return back()->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        $status = $request->status;
        $user = User::all()->where('id',$id)->first();
        if($status == 'admin'){
            $user->delete();
        }elseif($status == 'peserta'){
            $user->delete();
        }
        return back()->with('warning','Data Berhasil Dihapus');
    }
}
