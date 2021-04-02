<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
    //	id	title	description	user_id	open_gate_date	start_date	end_date	image	link	attachment status_agenda_id	created_at	updated_at	deleted_at

    use SoftDeletes;

    protected $fillable = [
        'title', 'description', 'user_id', 'open_gate_date', 'start_date', 'end_date', 'image', 'link', 'attachment'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function status_agenda()
    {
        return $this->belongsTo('App\StatusAgenda');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('start_date', 'asc')->get();
    }
}
