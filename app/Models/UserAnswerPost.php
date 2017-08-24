<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswerPost extends Model
{
    public $timestamps = false;
    protected $table = 'user_answer_post';
    protected $primaryKey = 'id_useranswerpost';
}
