<?php
// app/Models/Task.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

  public $timestamps = true;

  protected $fillable = ['user_id', 'task_name', 'submission_date'];


    public function user() {
        return $this->belongsTo(App\User::class);
      }
}

