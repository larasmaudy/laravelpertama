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
            'groupsid' => 'required|numeric',
            'nama' => 'required|unique:friends|max:225',
            'notlp' => 'required|numeric',
            'alamat' => 'required', 
        ]);

        $friend = new Friends;
        
        $friend->Groups_Id = $request->groupsid;
        $friend->Nama = $request->name;
        $friend->No_Tlp = $request->notlp;
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
            'groupsid' => 'required|numeric',
            'nama' => 'required|unique:friends|max:225',
            'notlp' => 'required|numeric',
            'alamat' => 'required', 
        ]);

        Friends::find($id)->update([
            'groupsid' => $request->groupsid,
            'nama' => $request->nama,
            'notlp' => $request->notlp,
            'alamat' => $request->alamat,
        ]);

        return redirect ('/');
    }
    public function destory($id)
    {
        Friends::find($id)->delete();
    return redirect ('/'); 
    }
}
