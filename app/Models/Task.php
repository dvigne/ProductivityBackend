<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $incrementing = false;

    protected static function boot()
    {
      parent::boot();

      static::creating(function ($model) {
        $model->{$model->getKeyName()} = (string) Str::uuid();
      });
    }

    protected $fillable = [
      'assigned', 'name', 'description', 'category', 'status'
    ];

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }
}
