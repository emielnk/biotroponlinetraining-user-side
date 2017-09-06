<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
  protected $table = 'Bahan';

  protected $primaryKey = 'id_bahan';

  public $timestamps = false;
}
