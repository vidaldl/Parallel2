<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service2 extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'icon', 'title', 'contenido'
  ];
}
