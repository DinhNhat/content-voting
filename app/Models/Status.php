<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public static function getCount(): array
    {
        return Idea::query()
            ->selectRaw("count(*) as all_statuses")
            ->selectRaw("sum(status_id = 1) as open")
            ->selectRaw("sum(status_id = 2) as considering")
            ->selectRaw("sum(status_id = 3) as in_progress")
            ->selectRaw("sum(status_id = 4) as implemented")
            ->selectRaw("sum(status_id = 5) as closed")
            ->first()
            ->toArray();
    }
}
