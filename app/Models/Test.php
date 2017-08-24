<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public $timestamps = false;
    protected $table = 'test';
    protected $primaryKey = 'id_test';
}
