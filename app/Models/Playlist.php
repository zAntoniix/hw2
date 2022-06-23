<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Playlist extends Model
{
  protected $connection = 'mongodb';
  protected $table = 'playlists';
}
?>