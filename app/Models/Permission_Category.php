<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission_Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name'
    ];
    public function getPermissions()
    {
        return DB::table('permissions')
            ->where('permission_category_id', $this->id) // Assuming 'permission_category_id' is the foreign key in 'permissions' table
            ->get();
    }
}
