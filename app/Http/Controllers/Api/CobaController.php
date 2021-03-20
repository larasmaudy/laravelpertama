<?php

namespace App\Http\Controllers\Api;

use App\models\Friends;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Friends::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' => true,
            'messege' => 'Daftar Teman',
            'data'      => $friends
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'groupsid' => 'required|numberic',
            'nama' => 'required|unique:friends|max:225',
            'notlp' => 'required|numberic',
            'alamat' => 'required',
        ]);

        $friends = Friends::create([
            'groupsid' => $request->groupsid,
            'nama' => $request->nama,
            'notlp' => $request->notlp,
            'alamat' => $request->alamat,
        ]);

        if($friends){
            return response()->json([
                'success' => true,
                'messege' => 'Produk Berhasil Ditambahkan',
                'data'      => $friends
            ], 200);   
        }else{
            return response()->json([
            'success' => false,
            'messege' => 'Produk Gagal Ditambahkan',
            'data'      => $friends
            ], 409);
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
        $friend = Friends::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail Teman',
            'data'    => $friend
        ], 200);
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
        $request->validate([
            'groupsid' => 'required|numberic',
            'nama' => 'required|unique:friends|max:225',
            'notlp' => 'required|numberic',
            'alamat' => 'required', 
        ]);

        $friends = Friends::update([
            'groupsid' => $request->groupsid,
            'nama' => $request->nama,
            'notlp' => $request->notlp,
            'alamat' => $request->alamat,s
        ]);

            return response()->json([
                'success' => true,
                'messege' => 'Post Updated',
                'data'      => $friends
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
        $cek = Friends::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);

    }
}
