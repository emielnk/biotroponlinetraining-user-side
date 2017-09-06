<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionTest extends Model
{
  protected $table = 'option_test';

  protected $primaryKey = 'id_option';

  public $timestamps = false;
}
