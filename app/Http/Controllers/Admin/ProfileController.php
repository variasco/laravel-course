<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->paginate(5);
        return view("admin.profile.index")->with("users", $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view("admin.profile.create")->with("user", $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUserRequest  $request
     * @param  App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request)
    {
        $newUser = $request->validated();
        $newUser["admin"] = isset($newUser["admin"]);
        $newUser["password"] = Hash::make($newUser["password"]);
        $user->fill($newUser)->save();
        return redirect()->route("admin.user.index")->with("success", "Пользователь успешно создан");
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
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("admin.profile.create")->with("user", $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUserRequest  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, User $user)
    {
        $newUser = $request->validated();
        $newUser["admin"] = isset($newUser["admin"]);
        $newUser["password"] = Hash::make($newUser["password"]);
        $user->fill($newUser)->save();
        return redirect()->route("admin.user.index")->with("success", "Пользоваель успешно изменён");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("admin.user.index")->with("success", "Пользоваель успешно удалён");
    }

    public function toggle(User $user)
    {
        $user->admin = !$user->admin;
        $user->save();
        return redirect()->route("admin.user.index")->with("success", "Статус пользователя изменён");
    }
}
