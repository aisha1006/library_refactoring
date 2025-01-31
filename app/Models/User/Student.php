<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;

class Student extends Authenticatable implements UserCidAttribute
{
    use HasApiTokens, HasFactory;

    public $incrementing = false;
    protected $table = 'dbmaster.students';
    protected $primaryKey = 'stud_id';
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'surname',
        'class',
        'status',
        'passw',
        'web_lan',
        'last_psw_set_date',
        'emp_id',
        'type',
        'name_native',
        'surname_native',
        'old_sdu_id',
        'patronymic',
        'prog_code_reg',
        'prog_year_reg',
        'last_login_info',
        'attempt_count',
        'attempt_date',
        'edu_level',
        'entrance_year',
        'study_count'
    ];

    protected $hidden = [
        'stud_id',
        'passw',
        'web_lan',
        'last_psw_set_date',
        'emp_id',
        'type',
        'name_native',
        'surname_native',
        'old_sdu_id',
        'patronymic',
        'prog_code_reg',
        'prog_year_reg',
        'last_login_info',
        'attempt_count',
        'attempt_date',
        'entrance_year',
        'study_count'
    ];

    protected $appends = ['user_cid', 'username', 'id'];

    public function getUserCidAttribute()
    {
        return DB::table('lib_user_cards as uc')->select('uc.user_cid')->where('uc.stud_id', $this->stud_id)->first()->user_cid;
    }

    public function getUsernameAttribute()
    {
        return $this->stud_id;
    }

    public function getIdAttribute()
    {
        return $this->stud_id;
    }
}
