<?php

namespace App\Http\Controllers;

use App\Imports\CertificateImport;
use App\Models\Melc;
use App\Models\Settings;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
  //
  public function index()
  {
    return Inertia::render('Dashboard');
  }

  public function generate(Request $request)
  {
    // check if excel file 
    $request->validate([
      'file' => 'required|mimes:xlsx,xls',
    ]);

    $file = $request->file('file');

    // read imports
    $collection = (new CertificateImport(1))->toCollection($file)[0]->toArray();


    $certificates = [];

    // foreach ($collection as $row) {
    //   $certificates[] = $row;
    // }

    // get all settings 
    $settings = Settings::All();

    // get all melcs
    // get only the description and store it to array
    $_melcs = Melc::orderBy('order', 'asc')->get()
      ->map(function ($melc) {
        return $melc->only('description');
      });


    $melcsStart = 5;
    // $melcsEnd = $melcsStart + count($_melcs) - 1;

    $title = $settings->where('name', 'title')->first()?->value;
    $school_year = $settings->where('name', 'school_year')->first()?->value;
    $adviser = $settings->where('name', 'adviser')->first()?->value;
    $grade_section = $settings->where('name', 'grade_section')->first()?->value;
    $signature = $settings->where('name', 'signature')->first()?->value;

    for ($i = 13; $i < count($collection); $i++) {
      if ($collection[$i][3] != null) {
        $melcs = [];
        // for ($j = $melcsStart; $j <= $melcsEnd; $j++) {
        //   if ($collection[$i][$j] != null) {
        //     $melcs[] = ['score' => $collection[$i][$j], 'description' => $melcs[$j - $melcsStart]['description']];
        //   }
        // }

        $iteration = $melcsStart;
        foreach ($_melcs as $melc) {
          $melcs[] = [
            'score' => $collection[$i][$iteration],
            'description' => $melc['description'],
          ];
          $iteration++;
        }
        $certificates[] = [
          'name' => $collection[$i][3],
          'melcs' => $melcs,
          'title' => $title,
          'school_year' => $school_year,
          'adviser' => $adviser,
          'grade_section' => $grade_section,
          'signature' => $signature
        ];
      } else {
        break;
      }
    }


    $pdf = Pdf::loadView('pdf.certificate', ['certificates' => $certificates]);
    $pdf->save(public_path('certificates\sample.pdf'));

    // return view('pdf.certificate', [$certificates => $certificates]);

    // return response()->json([
    //   'message' => 'success',
    //   'file' => $certificates,
    // ]);
  }
}
