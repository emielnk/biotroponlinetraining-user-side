<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswerPost extends Model
{
  protected $table = 'user_answer_post';

  protected $primaryKey = 'id_useranswerpost';

  public $timestamps = false;
}
