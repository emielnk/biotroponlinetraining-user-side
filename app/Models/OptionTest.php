<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionTest extends Model
{
    public $timestamps = false;
    protected $table = 'option_test';
    protected $primaryKey = 'id_option';
}
