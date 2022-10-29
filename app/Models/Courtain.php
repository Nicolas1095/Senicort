<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courtain extends Model
{
    use HasFactory;
    protected $table = 'courtains';
    protected $fillable = ['title', 'img', 'description'];
    public function getRouteKeyName()
    {
        return 'url';
    }
}
