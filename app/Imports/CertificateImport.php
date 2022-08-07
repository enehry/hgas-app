<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

class CertificateImport implements ToCollection
{

  public function __construct(
    public int $headerStart
  ) {
  }

  use Importable;
  /**
   * @param Collection $collection
   */
  public function collection(Collection $rows)
  {
    //
    foreach ($rows as $row) {
    }
  }
}
