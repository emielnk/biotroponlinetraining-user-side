<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training';
    protected $primaryKey = 'id_training';
    public $timestamps = false;
}
