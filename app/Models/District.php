<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Models\Commune;

use App\Models\Village;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class District extends Authenticatable implements AuditableContract
{
    use HasFactory;
    use AuditableTrait;
    use LogsActivity;

    protected $table = 'tb_district';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $fillable = [
        'province_code',
        'code',
        'type',
        'khmer',
        'english',
        'commune',
        'sangkat',
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
    public function cammuneVillage(){
        return $this->belongsTo(Village::class,'village');
    }
    public function getVillageNameAttribute(){
        return Helper::getLang() == 'en' ? optional($this->cammuneVillage)->english : optional($this->cammuneVillage)->khmer;
    }
    public function districtCammune(){
        return $this->belongsTo(Commune::class,'commune');
    }
    public function getCammuneNameAttribute(){
        return Helper::getLang() == 'en' ? optional($this->districtCammune)->english : optional($this->districtCammune)->khmer;
    }
    public function survey()
    {
        return $this->hasMany(Survey::class);
    }
}

