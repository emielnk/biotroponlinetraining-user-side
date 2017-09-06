<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionTest extends Model
{
  protected $table = 'question_test';

  protected $primaryKey = 'id_question';

  public $timestamps = false;
}
