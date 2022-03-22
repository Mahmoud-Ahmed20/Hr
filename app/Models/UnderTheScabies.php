<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class UnderTheScabies extends Model
{
    use HasFactory;
    protected $table = 'under_the_scabies';
    protected $fillable = [
        'staff_id',
        'job_id',
        'administration_id',
        'direct_admin_name',
        'date_of_being_hired',
        'performance_appraisal_date',
        'maintain_working_hours',
        'good_productivity_performance',
        'production_quantity',
        'learning_ability',
        'work_progress',
        'adhere_to_the_directives_instructions',
        'initiative_and_quick_wit',
        'relationship_with_colleagues',
        'ability_to_organize_work',
        'take_advantage_of_working_time',
        'direct_administrators_recommendation',
        'notes',
        'section_id',
        'is_activate',
        'archive'
    ];
    public $timestamps= true;

    public function scopeNotArchive($query)
    {
        return $query->where('archive',0);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }
    public function job()
    {
        return $this->belongsTo(Job::class,'job_id');
    }
    public function administration()
    {
        return $this->belongsTo(Administration::class,'administration_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

}
