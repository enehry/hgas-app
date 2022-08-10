<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $request->validate([
      'search' => 'nullable|string',
    ]);
    //
    // get all users
    $users = User::where('name', 'like', '%' . $request->search . '%')->get();

    return Inertia::render('Users/Index', [
      'users' => $users,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
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
  public function edit($id)
  {
    //
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
    // return response()->json([
    //   $request->all(),
    // ]);
    //  
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email',
      'role' => 'required|in:admin,user',
      'password' => 'nullable|string|min:6|confirmed',
    ]);

    if ($request->password) {
      // hash the password
      $request->merge(['password' => bcrypt($request->password)]);
      // update the user
      $user->update($request->all());
    } else {
      $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
      ]);
    }



    return redirect()->back()->withBanner('User updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    //
    $user->delete();
    return redirect()->back()->withBanner('User deleted successfully');
  }
}
