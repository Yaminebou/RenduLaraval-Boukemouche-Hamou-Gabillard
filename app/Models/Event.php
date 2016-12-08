<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'description','start','finish','lieu', 'tarif', 'user_id'];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
