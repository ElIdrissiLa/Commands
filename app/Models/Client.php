<?php

namespace App\Models;
use App\Models\Pay;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public function pay(){
        return $this->belongsTo(Pay::class, 'pay_id');
    }
    public function clients(){
        return $this->belongsToMany(Pay::class)->withPivot('qte');
    }
}
