<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function status():BelongsTo{
        return $this->belongsTo(Status::class);
    }
    public function priority():BelongsTo{
        return $this->belongsTo(Priority::class);
    }

    function histories() : HasMany {
        return $this->hasMany(History::class);
    }
}
