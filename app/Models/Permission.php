<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use SoftDeletes, HasFactory;


    protected $table = 'permissions';

    protected $fillable = [
        'permission_category_id',
        'name',
        'guard_name',
        'created_at',
        'updated_at',
    ];

    // Optional: Enable date casting for deleted_at
    protected $dates = ['deleted_at'];
}
