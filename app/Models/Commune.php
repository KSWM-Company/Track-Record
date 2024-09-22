<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Models\Village;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Commune extends Authenticatable implements AuditableContract
{
    use HasFactory;
    use AuditableTrait;
    // use SoftDeletes;
    use LogsActivity;
    
    protected $table = 'tb_commune';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $fillable = [
        'district_code',
        'code',
        'type',
        'khmer',
        'english',
        'village',
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
    //function relateship
    public function cammuneVillage(){
        return $this->belongsTo(Village::class,'village');
    }
    public function getVillageNameAttribute(){
        return Helper::getLang() == 'en' ? optional($this->cammuneVillage)->english : optional($this->cammuneVillage)->khmer;
    }
    public function survey()
    {
        return $this->hasMany(Survey::class);
    }
}

