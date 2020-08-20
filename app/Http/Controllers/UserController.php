<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource as UserResource;
use App\Http\Resources\UserRelationshipsResource as UserRelationshipsResource;

class UserController extends Controller
{
    /**
     * Return a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        //return collection of articles as a resource
        return UserResource::collection(
            User::paginate(15)
        );
    }

    public function index()
    {
        return view('users.index');
    }

    public function getUserData($id)
    {
        $user = User::find($id);

        return new UserResource($user);
    }

    public function show($id)
    {
        return view('users.show');
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product type has been deleted'
        ]);
    }
}
