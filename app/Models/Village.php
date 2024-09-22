<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;


use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Village extends Authenticatable implements AuditableContract
{

    use HasFactory;
    use AuditableTrait;
    use LogsActivity;

    protected $table = 'tb_village';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $fillable = [
        'commune_code',
        'code',
        'khmer',
        'english',
        'reference',
        'official_note',
        'note_by_checker',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
    public function getVillageNameAttribute(){
        return optional($this->village)->khmer;
    }
    public function survey()
    {
        return $this->hasMany(Survey::class);
    }
}





