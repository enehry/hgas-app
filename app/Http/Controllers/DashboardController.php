<?php

namespace App\Http\Controllers;

use App\Imports\CertificateImport;
use App\Models\Certificate;
use App\Models\Melc;
use App\Models\Settings;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  //
  public function index()
  {
    $userID = Auth::user()->id;
    $settings = Settings::where('user_id', $userID)->get();
    $melcs = Melc::where('user_id', $userID)->orderBy('order', 'asc')->get();
    // get certificate path
    $generatedCert = Certificate::where('user_id', $userID)->latest()->first();



    return Inertia::render('Dashboard', [
      'melcs' => $melcs,
      'certificate' => [
        'title' => $settings->where('name', 'title')->first()?->value,
        'school_year' => $settings->where('name', 'school_year')->first()?->value,
        'adviser' => $settings->where('name', 'adviser')->first()?->value,
        'grade_section' => $settings->where('name', 'grade_section')->first()?->value,
        'signature' => $settings->where('name', 'signature')->first()?->value,
      ],
      'generatedCert' => $generatedCert,
    ]);
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
    $settings = Settings::where('user_id', Auth::user()->id)->get();



    // get all melcs
    // get only the description and store it to array
    $_melcs = Melc::where('user_id', Auth::user()->id)->orderBy('order', 'asc')->get()
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
          $score = $collection[$i][$iteration];
          // interpret the score 
          $interpretation = '';
          if ($score >= 3.5) {
            $interpretation = 'Developed and Commendable';
          } else if ($score >= 2.5) {
            $interpretation = 'Sufficiently Developed';
          } else if ($score >= 1.5) {
            $interpretation = 'Developing';
          } else if ($score >= 0.5) {
            $interpretation = 'Needs Improvement';
          } else {
            $interpretation = 'No chance to observe';
          }

          $melcs[] = [
            'score' => $collection[$i][$iteration],
            'description' => $melc['description'],
            'interpretation' => $interpretation,
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
          'signature' => $signature,

        ];
      } else {
        break;
      }
    }


    $pdf = Pdf::loadView('pdf.certificate', ['certificates' => $certificates]);

    // save path to database
    $userID = Auth::user()->id;
    $certificate = new Certificate();
    $certificate->user_id = $userID;
    $path = 'certificates/' . $userID . '-' . uniqid() . '.pdf';
    $pdf->save(public_path($path));
    $certificate->path = $path;
    $certificate->save();

    // return view('pdf.certificate', [$certificates => $certificates]);

    // return response()->json([
    //   'message' => 'success',
    //   'file' => $certificates,
    // ]);

    return redirect()->back()->withBanner('Certificates generated');
  }
}
