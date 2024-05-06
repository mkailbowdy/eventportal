<?php

namespace App\Models;

use App\Enums\Prefecture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'prefecture', 'city'];

    protected $casts = [
        'prefecture' => Prefecture::class,
    ];


    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user')
            ->withPivot('role');
    }
}
