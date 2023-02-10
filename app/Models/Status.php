<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    public static function getCount()
    {
        return Todo::query()
            ->selectRaw("count(*) as all_statuses")
            ->selectRaw("count(case when status_id = 1 then 1 end) as pending")
            ->selectRaw("count(case when status_id = 2 then 1 end) as done")
            ->first()
            ->toArray();
    }
}
