<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionTest extends Model
{
    public $timestamps = false;
    protected $table = 'question_test';
    protected $primaryKey = 'id_question';
}
