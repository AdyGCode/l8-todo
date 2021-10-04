<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10)->onEachSide(2);
        return view('users.browse', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact(['roles',]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:users',
                    'email:rfc'
//                    'email:rfc,dns'
                ],
                'password' => [
                    'confirmed',
                    'required',
                    Password::min(4)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
//                        ->symbols()
//                        ->uncompromised()
                    ,
                ],
                'roles' => [
                    'required',
                ],
            ]
        );

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => [
                    'required',
                    'string',
                    'max:255'
                ],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'email:rfc',
                    //'email:rfc,dns', // also check for valid smtp response
                    Rule::unique('users')->ignore($user),
                ],
                'password' =>
                    (isset($request->password) && !is_null($request->password) ?
                        [
                        'sometimes',
                        'confirmed',
                        'required',
                        Password::min(4)
                            ->letters()
                            ->mixedCase()
                            //->numbers()
                            //->symbols()
                            //->uncompromised(),
                    ] : [null]),
                'roles' => [
                    'required',
                ],
            ]
        );

        if ($request->input('name') !== $user->name) {
            $user->name = $request->input('name');
        }

        if ($request->input('email') !== $user->email) {
            $user->email = $request->input('email');
        }

        if (!is_null($request->input('password'))) {
            $user->password = $request->input('password');
        }

        $user->save();
        DB::table('model_has_roles')->where('model_id',$user->id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user)
    {
        return view('users.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');    }
}
