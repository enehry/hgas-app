<?php

namespace App\Models;



class Certificate
{

  public function __construct(
    public string $name,
    public array $melcs,
  ) {
  }
}
