<?php

namespace App\Http\Controllers;

use App\Http\Requests\users\storeRequest;
use App\Http\Requests\users\updateRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('id', '!=', 1)->get();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(storeRequest $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->remember_token = Str::random(60);
            $user->email_verified_at = now();
            $user->save();
            Toastr::success('save successfully');
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        try {
            $user = User::findOrFail($id);
            return view('users.edit', compact('user'));
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->withErrors(['error' => $th->getMessage()]);
        }
    }


    public function update(updateRequest $request, string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            //check if request has password
            if ($request->password) {

                $user->password = $request->password;
            }
            $user->save();
            Toastr::success('save successfully');
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }
    public function destroy(Request $request, string $id)
    {
        try {
            User::findOrFail($request->id)->delete();
            Toastr::success('successfully deleted');
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function formDelete($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('users.delete', compact('user'));
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->withErrors(['error' => $th->getMessage()]);
        }
    }
}
