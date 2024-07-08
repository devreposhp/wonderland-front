<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatlogRoom extends Model
{
    use HasFactory;

    protected $table = 'chatlogs_room';

    protected $guarded = [];

    public $timestamps = false;

    protected $primaryKey = 'timestamp';

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_from_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'user_to_id');
    }
}
