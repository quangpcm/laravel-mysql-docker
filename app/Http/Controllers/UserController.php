<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Log;
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

        return $user->get();
    }

    public function scopeName($query, $request) {
    if ($request->has('name')) {
        $query->where('name', 'LIKE', '%' . $request->name . '%');
    }

    return $query;
}

    // GET /users/{users} users.show
    public function show($id) {
        $user = User::with('tasks')->find($id);
        return $user;
    }

    // POST /users users.store
    public function store(Request $request) {
        // Log::info('aaa');
        // $validated = $request->validated();

        // if (!$validated) {
        //     abort(404, 'ERROR', []);
        // }

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
                'uuid' => 'uuid',
            ];
            $newUser = User::create($userData);
            return $newUser;
        };
    }

    // PUT/PATCH /users/{users} users.update
    public function update($id, Request $request) {

        // Retrieve the validated input data...

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
