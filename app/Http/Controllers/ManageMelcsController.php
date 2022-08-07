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

    $data = Melc::all();

    return Inertia::render('ManageMelcs/Index', [
      'melcs' => $data,
    ]);
  }
}
