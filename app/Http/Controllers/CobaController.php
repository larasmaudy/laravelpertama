<?php

namespace App\Http\Controllers;
use App\models\Friends;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index()
    {
        $friends = Friends::paginate(3);

        return view('index', compact('friends'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validate the request...

        $friend = new Friends;

        $friend->Nama = $request->name;
        $friend->No_Tlp = $request->no_tlp;
        $friend->Alamat = $request->alamat;
        $friend->save();
    }
}
