<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
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
      'task_id', 'comment'
    ];

    public function task()
    {
      return $this->belongsTo('Task::class');
    }
}
