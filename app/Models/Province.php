<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Models\Commune;

use App\Models\Village;
use App\Models\District;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Province extends Authenticatable implements AuditableContract
{
    use HasFactory;
    use AuditableTrait;
    // use SoftDeletes;
    use LogsActivity;

    protected $table = 'tb_province';
    protected $guarded = ['id'];
    protected $fillable = [
        'code',
        'khmer',
        'english',
        'krong',
        'srok',
        'khan',
        'commune',
        'sangkat',
        'village',
        'reference',
        'latitude',
        'longitudes',
        'abbreviation',
        'east_en',
        'east_kh',
        'west_en',
        'west_kh',
        'south_en',
        'south_kh',
        'north_en',
        'north_kh',
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
    public function provinceDistrict(){
        return $this->belongsTo(District::class,'srok');
    }

    public function getDiststrictNameAttribute(){
        return Helper::getLang() == 'en' ? optional($this->provinceDistrict)->english : optional($this->provinceDistrict)->khmer;
    }
    public function survey()
    {
        return $this->hasMany(Survey::class);
    }
}
