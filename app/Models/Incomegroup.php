<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Incomegroup extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'description'];

    public function income(){
       return $this->hasMany(Incomegroup::class);
    }
}
