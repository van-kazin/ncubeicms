<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
    use HasFactory;
     use SoftDeletes;

    protected $casts = ['language' => 'array'];
    protected $fillable =
    [
       'name', 'image', 'birthdate', 'school', 'language',
        'member_id', 'gender', 'pastor',
       'houseaddress', 'hometown', 'phone',
       'email', 'marital_status', 'spouse_name',
       'children', 'father_name', 'mother_name',
       'nextofkin', 'educational_level', 'employment_status',
       'profession', 'placeofwork', 'date_enteredchurch',
       'baptism_date', 'former_church',
   ];

   public function income(){
     return $this->hasMany(Income::class);
   }

   public function attendance(){
     return $this->hasMany(Attendance::class);
   }

   // Many2Many RelationFunctions
   public function associations()
     {
         return $this->belongsToMany(Association::class);
     }

   public function departments()
     {
          return $this->belongsToMany(Department::class);
     }

    //    special many to many relationship functions for asociation, department & language //
    public function hasAssociation($associationId)
      {
          return in_array($associationId, $this->associations->pluck('id')->toArray());
      }

    public function hasDepartment($departmentId)
      {
          return in_array($departmentId, $this->departments->pluck('id')->toArray());
      }

    public function scopeSearched($query)
       {
           $search = request()->query('search');
             if(!$search)
           {
                 return $query;
           }
             return $query->where('name', 'LIKE', "%{$search}%");
       }
}
