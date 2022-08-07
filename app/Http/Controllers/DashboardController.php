<?php

namespace App\Http\Controllers;

use App\Imports\CertificateImport;
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

    $melcsStart = 5;
    $melcsEnd = 8;

    for ($i = 13; $i < count($collection); $i++) {
      if ($collection[$i][3] != null) {
        $melcs = [];
        for ($j = $melcsStart; $j <= $melcsEnd; $j++) {
          if ($collection[$i][$j] != null) {
            $melcs[] = ['score' => $collection[$i][$j], 'description' => 'Examine the different factors in decision making for the achievement of success Value
            oneself.'];
          }
        }
        $certificates[] = ['name' => $collection[$i][3], 'melcs' => $melcs];
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
