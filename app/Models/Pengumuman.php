<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
  protected $table = 'Pengumuman';

  protected $primaryKey = 'id_pengumuman';

  public $timestamps = false;
}
