<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "user_id",
        "begin_at",
        "hour_begin_at",
        "finished_at",
        "hour_finished_at",
        "observation_id",
        "month"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function observation()
    {
        return $this->hasOne(Observation::class);
    }

    public function getTask(): string
    {
        return \strtolower(\str_replace([' ', '.'], ['-', ''], $this->title));
    }
}
