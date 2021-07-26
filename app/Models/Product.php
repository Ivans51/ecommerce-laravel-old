<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

class Product extends Model {
  use HasFactory, HasUuid;

  public    $incrementing   = false;
  protected $uuidColumnName = 'id';
  protected $table          = 'product';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable
    = [
      'name', 'detail'
    ];
}
