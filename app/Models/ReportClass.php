<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class ReportClass extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use Auditable;
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    public $table = 'report_classes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
       
       'registrar_id',
        'class_names_id',
        'date',
        'total_hour',
        'class_names_id_2',
        'date_2',
        'total_hour_2',
        'month',
        'allowance',
        'record_student',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
        'fee_student',
        'status',
        'note',
        'receipt',
       'allowance_note',
    ];

    public function class_name()
   {
    //  return $this->belongsToThrough(User::class,AssignClassTeacher::class,
  //   'null',
   //  '',
   //   [User::class => 'teacher_id']);

   //  return $this->hasmanyThrough( 
   //  User::class,
   //  AssignClassTeacher::class,
   //  'project_id', // Foreign key on the environments table...
    //'environment_id', // Foreign key on the deployments table...
    // 'id', // Local key on the projects table...
   //  'id' );// Local key on the environments table...);
   return $this->belongsTo(ClassName::class, 'class_names_id');
    }

    public function class_name_2()
    {

    return $this->belongsTo(ClassName::class, 'class_names_id_2');
     }

   public function registrar()
    {
     //   return $this->belongsTo(AssignClassTeacher::class, 'student_id');
      // return $this->belongsToThrough(User::class,AssignClassTeacher::class,
      // 'null',
    //   '',
    //   [User::class => 'student_id']);
      //return $this->hasmanyThrough( 
     //   User::class,
     //   AssignClassTeacher::class,
     //   'project_id', // Foreign key on the environments table...
     //  'environment_id', // Foreign key on the deployments table...
     //   'id', // Local key on the projects table...
      //  'id' );// Local key on the environments table...);
      return $this->belongsTo(User::class, 'registrar_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

   

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

   //public function allowance()
   // {
    // return $this->belongsToThrough(ClassName::class,RegisterClass::class,
    // 'null',
    // '',
    // [ClassName::class => 'class_name_id']);
   // }
    
}
