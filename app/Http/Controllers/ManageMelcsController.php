<?php

namespace App\Http\Controllers;

use App\Models\Melc;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ManageMelcsController extends Controller
{
  //
  public function index()
  {

    $data = Melc::orderBy('order', 'asc')->get();

    return Inertia::render('ManageMelcs/Index', [
      'melcs' => $data,
    ]);
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'description' => 'required|string|max:255',
      'order' => 'required|integer',
    ]);

    Melc::create($data);

    return redirect()->back()->withBanners('Melc created successfully.');
  }


  public function delete(Melc $melc)
  {
    $melc->delete();
    return redirect()->back()->withBanners('Melc deleted successfully.');
  }
}
