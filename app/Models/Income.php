<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Income extends Model
{
    use HasFactory;

    protected $fillable = ['incomegroup_id', 'income_id', 'date', 'user_id', 'description', 'amount',
                            'currency', 'rate', 'bank_name', 'cheque_no', 'cheque_date', 'other'
                          ];

    public function incomegroup(){
      return $this->BelongsTo(Incomegroup::class);
    }

    public function user(){
      return $this->BelongsTo(User::class);
    }

    public function membership() {
      return $this->belongsTo(Membership::class);
    }
}
