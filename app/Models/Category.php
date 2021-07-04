<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

class Category extends Model {
  use HasFactory, HasUuid;

  public    $incrementing   = false;
  protected $uuidColumnName = 'id';
  protected $table          = 'category';
}
