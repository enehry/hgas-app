<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ManageMelcsController extends Controller
{
  //
  public function index()
  {
    return Inertia::render('ManageMelcs/Index');
  }
}
