<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Playlist extends Model
{
  protected $connection = 'mongodb';

  public function songs() {
    return $this->hasMany(Song::class);
  }
}
?>