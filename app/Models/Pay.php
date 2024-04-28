<?php

namespace App\Models;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;
    public function clients(){
        return $this->hasMany(Client::class, 'pay_id');
    }
}
