<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceStandardsTemplateEmployee extends Model
{
    use HasFactory;
    protected $table = 'performance_standards_template_employee';
    protected $fillable = [
        'staff_id',
        'job_title',
        'understand_business_rules',
        'get_work_done',
        'responding_to_work_pressure',
        'initiative_and_innovation_at_work',
        'accept_directives_from_managers',
        'flexibility_and_adaptability',
        'make_decisions_and_take_responsibility',
        'personal_cleanliness',
        'adhere_to_corporate_policies',
        'teamwork',
        'understand_notes',
        'get_work_done_notes',
        'responding_to_work_pressure_notes',
        'initiative_and_innovation_at_work_notes',
        'accept_directives_from_managers_notes',
        'flexibility_and_adaptability_notes',
        'make_decisions_and_take_responsibility_notes',
        'personal_cleanliness_notes',
        'adhere_to_corporate_policies_notes',
        'teamwork_notes',
        'archive',
        'is_activate'
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
}
