<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionEval extends Model
{
  protected $table = 'question_eval';

  protected $primaryKey = 'id_questioneval';

  public $timestamps = false;
}
