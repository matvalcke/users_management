<?php
// app/Models/Role.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    // Si vous ne souhaitez pas utiliser les timestamps (created_at, updated_at)
    public $timestamps = false;
}
