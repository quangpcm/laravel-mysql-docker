<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    // GET /users photos.index
    public function index(Request $request) {
        $user = User::query();
        
        $name = $request->query->get('name');
        if ($name != null) {
            $user->where('name', 'LIKE', '%'.$name.'%' );    
        }

        $email = $request->query->get('email');
        if ($email != null) {
            $user->where('email', 'LIKE', '%'.$email.'%' );    
        }

        // $user->where('deleted_at', '==', null);    
        return $user->onlyTrashed()->get();
    }

    public function scopeName($query, $request) {
    if ($request->has('name')) {
        $query->where('name', 'LIKE', '%' . $request->name . '%');
    }

    return $query;
}

    // GET /users/{users} users.show
    public function show($id) {
        return User::findOrFail($id);
    }

    // POST /users users.store
    public function store(Request $request) {
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        if (($name == null) && ($email == null) ($password == null)) {
            return 'ERROR';
        } else {
            // create user
            $userData = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ];
            $newUser = User::create($userData);
            return $newUser;
        };
    }

    // PUT/PATCH /users/{users} users.update
    public function update($id, Request $request) {
        $user = User::findOrFail($id);
        
        if ($user) {
            $name = $request->request->get('name');
            $email = $request->request->get('email');
            $password = $request->request->get('password');

            if ($name) {
                $user->name = $name;
            }

            if ($email) {
                $user->email = $email;
            }

            if ($password) {
                $user->password = $password;
            }
            $user->save();
        } else {
            return 'User is not register';
        }
        return $user;
    }

    // DELETE /users/{users} users.destroy
    public function destroy($id) {
        $user = User::findOrFail($id);

        if ($user) {
            $user->deleted_at = new DateTime();
            $user->save();
        } else {
            return 'User is not register';
        }
        return $user;
    }
}
