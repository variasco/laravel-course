<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();
        $errors = [];
        if ($request->isMethod("post"))
        {
            $this->validate($request, $this->valideateRules(), [], $this->attrubuteNames());

            if (Hash::check($request->post("password"), $user->password))
            {
                $user->fill([
                    "name" => $request->post("name"),
                    "email" => $request->post("email"),
                    "password" => Hash::make($request->post("new-password")),
                ]);
            }
            else
            {
                $errors["password"][] = "Неверный пароль";
                return redirect()->route("profile.update")->withErrors($errors);
            }

            $user->save();
            return redirect()->route("profile.update")->with("success", "Профиль успешно обновлен");
        }

        return view("profile")->with("user", $user);
    }

    protected function valideateRules()
    {
        return [
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string", "email", "max:255", "unique:users,email," . auth()->id()],
            "password" => ["required"],
            "new-password" => ["required", "string", "min:8"],
        ];
    }
    protected function attrubuteNames()
    {
        return [
            "new-password" => "Новый пароль"
        ];
    }
}
