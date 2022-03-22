<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;
    protected $table = 'nationalitys';
    public $timestamps= true;
    protected $fillable = [
        'name_nationality',
        'is_activate',
        'archive'
    ];
    public function scopeNotArchive($query){
        return $query->where('archive', 0);
    }

    public function scopeActive($query){
        return $query->where('is_activate', 1);
    }

    public function  scopeDeleteArchive($query)
    {
        return $query->where('archive',0);
    }
    public function nationality()
    {
        return $this->hasOne(jobOfferSpecification::class,'nationality_id');
    }
    public function Staff()
    {
        return $this->hasOne(Staff::class,'nationality_id');
    }
    public function  EffectiveDateNotice()
    {
        return $this->hasOne(EffectiveDateNotice::class,'nationality_id');

    }

}
