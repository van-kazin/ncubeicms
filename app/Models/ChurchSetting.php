<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChurchSetting extends Model
{
    use HasFactory;

    protected $fillable = [
       'church_name', 'assembly_name', 'church_logo',
       'church_box_no', 'church_location', 'church_phone',
       'church_email', 'church_website',
   ];
}
