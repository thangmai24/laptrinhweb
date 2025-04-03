<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CRUD User controller
 */
class CrudUserController extends Controller
{

    /**
     * Login page
     */
    public function login()
    {
        return view('crud_user.login');
    }

    public function update()
    {
        return view('crud_user.update');
    }


    /**
     * User submit form login
     */
    public function authUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * Registration page
     */
    public function createUser()
    {
        return view('crud_user.create');
    }

    /**
     * User submit form register
     */
    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ], [
            'password.confirmed' => 'Mật khẩu và mật khẩu xác nhận không khớp.',
        ]);

        $data = $request->all();
        $check = User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],

        ]);

        return redirect("login");
    }

    /**
     * View user detail page
     */
    public function readUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.read', ['messi' => $user]);
    }

    /**
     * Delete user by id
     */
    public function deleteUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * Form update user page
     */
    public function updateUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user.list')->with('error', 'User not found');
        }

        return view('crud_user.update', compact('user'));
    }


    /**
     * Submit form update user
     */
    public function postUpdateUser(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:users,id',  // Ensure 'id' exists
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'required|min:6',
        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash password
        $user->save();

        return redirect()->route('user.list')->with('success', 'User updated successfully');
    }


    /**
     * List of users
     */
    public function listUser()
    {


        if (Auth::check()) {
            $users = User::all();
            return view('crud_user.list', ['users' => $users]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Sign out
     */
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
