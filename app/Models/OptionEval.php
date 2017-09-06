<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionEval extends Model
{
  protected $table = 'option_eval';

  protected $primaryKey = 'id_answereval';

  public $timestamps = false;
}
