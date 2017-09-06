<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswerEval extends Model
{
  protected $table = 'user_answer_eval';

  protected $primaryKey = 'id_useranswereval';

  public $timestamps = false;
}
