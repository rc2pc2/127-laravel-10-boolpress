<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with("posts", "roles")->paginate(5); // % lazy loading di 5 utenti

        return response()->json([
            'success' => true,
            'results' => $users
        ]);
    }

    public function show(User $user){
        $user->loadMissing("posts", "roles"); // # eager loading del singolo utente con d.i.

        return response()->json([
            'success' => true,
            'results' => $user
        ]);
    }

    public function userSearch(Request $request){
        $data = $request->all();

        $users = User::where("name", "LIKE", $data["name"] . "%")->get();

        return response()->json([
            'success' => true,
            'results' => $users
        ]);
    }
}
