<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Crud extends Authenticatable implements AuditableContract
{
    use HasFactory, AuditableTrait;
    protected $fillable = [
        'id',
        'name'
    ];
}
