<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    public $timestamps = false;
    protected $table = 'user';
    protected $primaryKey = ('id_user');
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'negara_asal', 
        'agama',
        'marital_status',
        'id_type',
        'nomor_id',
        'tanggal_awal_id',
        'tanggal_akhir_id',
        'email', 
        'no_telepon',
        'english_profiency',
        'alamat',
        'high_degree',
        'nama_instansi',
        'year_obtained',
        'job_pos',
        'job_institution',
        'job_contact',
        'job_alamat',
        'area_interest', 
        'pendidikan_terakhir', 
    ];
    protected $hidden = [
        'password',
        'user_activation_code',
        'activated'
    ];
}
