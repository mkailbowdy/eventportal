<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'location', 'event_date', 'start_time', 'end_time', 'max_participants', 'group_id',
        'participants'
    ];

    protected $casts = [
        'event_date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function users()
    {
        // if we dont add withPivot, we can only get the user_id and event_id, but not participation
        return $this->belongsToMany(User::class)
            ->withPivot(['participation_status']);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
