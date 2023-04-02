<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.data')->with([
            'users' => Users::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        $users = new Users;
        $users->name = $request->txtname;
        $users->username = $request->txtusername;
        $users->password = $request->txtpassword;
        $users->save();

        return redirect('users')->with('msg', 'add new Users Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */

    public function show(Users $users, $id)
    {
        $data = $users->find($id);
        return view('users.formedit')->with([
            'id' => $id,
            'txtname' => $data->name,
            'txtusername' => $data->username,
            'txtpassword' => $data->password,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, Users $users, $id)
    {
        $data = $users->find($id);
        // $users->update($request->all());

        $data->name = $request->txtname;
        $data->username = $request->txtusername;
        $data->password = $request->txtpassword;
        $data->save();



        return redirect('users')->with('msg', 'User with name ' . $data->name . ' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */

    public function destroy(Users $users, $id)
    {
        $data = $users->find($id);
        $data->delete();
        return redirect('users')->with('msg', 'User with name ' . $data->name . ' Deleted');
    }
}
