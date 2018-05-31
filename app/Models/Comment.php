<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['client_id', 'comment'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class, 'comment_id');
    }

    
}
