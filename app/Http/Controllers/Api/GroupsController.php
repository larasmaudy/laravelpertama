<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Friends;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $group = Groups::orderby('id', 'desc') -> paginate(3);

        return response()->json([
            'success' => true,
            'messege' => 'Daftar Data Produk',
            'data'      => $friends
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
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
            'name' => 'required|unique:groups|max:255',
            'description' => 'required',
        ]);

        $group = new Groups;

        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();

        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Groups::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Produk',
            'data'    => $friend
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Groups::where('id', $id)->first();
        return view('groups.edit', ['group' => $group]);
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
            'nama' => 'required|unique:friends|max:225',
            'persediaan' => 'required|numberic',
            'harga' => 'required', 
        ]);

        $group = Groups::update([
            'nama' => $request->nama,
            'persediaan' => $request->persediaan,
            'harga' => $request->harga,
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

    public function addmember($id)
    {
        $friend = Friends::where('groups_id', '=', 0)->get();
        $group = Groups::where('id',$id)->first();
        return view('groups.addmember', ['group' => $group, 'friend' => $friend]);
    }

    public function updateaddmember(Request $request, $id)
    {
        $friend = Friends::where('id,$request->friend_id')->first();
        Friends::find($friend->id)->update([
            'groups_id' => $id
        ]);

        return redirect('/groups/addmember/'. $id);
    }

    public function deleteaddmember(Request $request, $id)
    {
        Friends::find($friend->id)->update([
            'groups_id' => 0
        ]);

        return redirect('/groups');
    }

}
