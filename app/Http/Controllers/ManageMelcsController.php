<?php

namespace App\Http\Controllers;

use App\Models\Melc;
use App\Models\Settings;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ManageMelcsController extends Controller
{
  //
  public function index()
  {

    $data = Melc::orderBy('order', 'asc')->get();

    $settings = Settings::All();

    return Inertia::render('ManageMelcs/Index', [
      'melcs' => $data,
      'certificate' => [
        'title' => $settings->where('name', 'title')->first()?->value,
        'school_year' => $settings->where('name', 'school_year')->first()?->value,
        'adviser' => $settings->where('name', 'adviser')->first()?->value,
        'grade_section' => $settings->where('name', 'grade_section')->first()?->value,
        'signature' => $settings->where('name', 'signature')->first()?->value,
      ],
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

  // update
  public function update(Melc $melc, Request $request)
  {
    $data = $request->validate([
      'description' => 'required|string|max:255',
      'order' => 'required|integer',
    ]);
    $melc->update($data);
    return redirect()->back()->withBanners('Melc updated successfully.');
  }


  public function updateOrCreateCertInfo(Request $request)
  {
    $data = $request->validate([
      'title' => 'required|string|max:255',
      'school_year' => 'required|string|max:255',
      'adviser' => 'required|string|max:255',
      'grade_section' => 'required|string|max:255',
    ]);


    if ($request->title) {
      $cert = Settings::where('name', 'title')->first();
      if (!$cert) {
        $cert = Settings::create([
          'name' => 'title',
          'value' => $request->title,
        ]);
      } else {
        $cert->update([
          'value' => $request->title,
        ]);
      }
    }

    if ($request->school_year) {
      $cert = Settings::where('name', 'school_year')->first();
      if (!$cert) {
        $cert = Settings::create([
          'name' => 'school_year',
          'value' => $request->school_year,
        ]);
      } else {
        $cert->update([
          'value' => $request->school_year,
        ]);
      }
    }

    if ($request->adviser) {
      $cert = Settings::where('name', 'adviser')->first();
      if (!$cert) {
        $cert = Settings::create([
          'name' => 'adviser',
          'value' => $request->adviser,
        ]);
      } else {
        $cert->update([
          'value' => $request->adviser,
        ]);
      }
    }

    if ($request->grade_section) {
      $cert = Settings::where('name', 'grade_section')->first();
      if (!$cert) {
        $cert = Settings::create([
          'name' => 'grade_section',
          'value' => $request->grade_section,
        ]);
      } else {
        $cert->update([
          'value' => $request->grade_section,
        ]);
      }
    }

    if ($request->hasFile('signature')) {
      $cert = Settings::where('name', 'signature')->first();

      // save file to public path 
      $file = $request->file('signature');

      // rename to unique name
      $filename = uniqid() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path('signatures'), $filename);
      $file_path = 'signatures/' . $filename;


      if (!$cert) {
        $cert = Settings::create([
          'name' => 'signature',
          'value' => $file_path,
        ]);
      } else {
        $cert->update([
          'value' => $file_path,
        ]);
      }
    }


    return redirect()->back()->withBanners('Melc updated successfully.');
  }
}
