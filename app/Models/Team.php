<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Str;

class Team extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $table = 'team';

    protected static function boot()
    {
      parent::boot();

      static::creating(function ($model) {
        $model->{$model->getKeyName()} = (string) Str::uuid();
      });
    }

    protected $fillable = [
      'team_id', 'name'
    ];

    public function tasks()
    {
      return $this->hasMany(Task::class);
    }

    public function members()
    {
      return $this->hasMany(User::class);
    }
}
