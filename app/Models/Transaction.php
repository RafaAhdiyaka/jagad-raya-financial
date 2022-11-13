<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $guarded = [''];

    public function category(){
    return $this->belongsTo(Category::class);
    }
    public function income(){
    return $this->belongsTo(Income::class);
    }
    public function outcome(){
    return $this->belongsTo(Outcome::class);
    }
}
