<?php

namespace App\Http\Controllers;

use App\User;
use App\Level;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.user.index',[
            'data'=>User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.user.create', [
            'levels' => Level::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi user
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'level_id' => 'required',
        ]);

        // Simpan user baru ke database
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'level_id' => $validatedData['level_id'],

        ]);

        // Redirect ke halaman sukses atau lakukan tindakan lain yang Anda inginkan
        return redirect()->route('user.index')->with('success', 'User created successfully');

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.user.edit',[
            'data' => $user,
            'levels' => Level::all(),
        ]);
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


        // Validasi input pengguna
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|min:6',
            'level_id' => 'required',
        ]);

        // Update data pengguna
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }
        $user->level_id = $validatedData['level_id'];
        $user->save();

        // Redirect ke halaman sukses atau lakukan tindakan lain yang Anda inginkan
        return redirect()->route('user.index')->with('success', 'User updated successfully');

        // // Validasi input pengguna
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email,' . $user->id,
        //     'password' => 'required|min:6',
        // // Tambahkan validasi untuk informasi lain yang ingin diedit
        // ]);

        // // Update data pengguna
        // $user->update($validatedData);

        // // Redirect ke halaman sukses atau lakukan tindakan lain yang Anda inginkan
        // return redirect()->route('user.index')->with('success', 'User updated successfully');

        // User::find($user->id)->update($request->except('_method','_token'));
        // return redirect()->route('user.index')->with('message','edit an user');
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
        return redirect()->route('user.index')->with('message','delete an user');
    }
}
