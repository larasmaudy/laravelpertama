<?php

namespace App\Http\Controllers;
use App\models\Friends;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index()
    {
        $friends = Friends::orderBy('id', 'desc')->paginate(3);

        return view('friends.index', compact('friends'));
    }

    public function create()
    {
        return view('friends.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'nama' => 'required|unique:friends|max:225',
            'no_tlp' => 'required|numberic',
            'alamat' => 'required', 
        ]);

        $friend = new Friends;

        $friend->Nama = $request->name;
        $friend->No_Tlp = $request->no_tlp;
        $friend->Alamat = $request->alamat;
        $friend->save();
    }
    public function show($id)
    {
        $friend = Friends::where('id', $id)->first();
        return view('friends.show', ['friends' => $friend]);
    }
    public function edit($id)
    {
        $friend = Friends::where('id', $id)->first();
        return view('friends.edit', ['friends' => $friend]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:friends|max:225',
            'no_tlp' => 'required|numberic',
            'alamat' => 'required',   
        ]);

        Friends::find($id)->update([
            'Nama' => $request->nama,
            'No_Tlp' => $request->no_tlp,
            'Alamat' => $request->alamat,
        ]);

        return redirect ('/');
    }
    public function destory($id)
    {
        Friends::find($id)->delete();
    return redirect ('/'); 
    }
}
