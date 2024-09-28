<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use LogsActivity;
use SoftDeletes;
use HasRoles;

class Role extends Model
{
    use HasFactory;
}
