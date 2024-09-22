<?php

namespace App\AuditResolvers;

use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Resolver;
use Illuminate\Support\Facades\Auth;

class UserTypeResolver implements Resolver
{
    public static function resolve(Auditable $auditable)
    {
        return Auth::user()->name; 
    }
}
