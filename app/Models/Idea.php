<?php

namespace App\Models;

use App\Exceptions\VoteNotFoundException;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public const PAGINATION_COUNT = 5;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function votes()
    {
        return $this->belongsToMany(User::class, 'votes');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return string
     */
    public function getStatusClasses()
    {
        if ($this->status->name === 'Open') {
            return 'bg-gray-200';
        } elseif ($this->status->name === 'Considering') {
            return 'bg-purple text-white';
        } elseif ($this->status->name === 'In Progress') {
            return 'bg-yellow';
        } elseif ($this->status->name === 'Implemented') {
            return 'bg-green text-white';
        } elseif ($this->status->name === 'Closed') {
            return 'bg-red text-white';
        }

        return 'bg-gray-200';
    }

    public function isVotedByUser(?User $user)
    {
        if (! $user) return false;

        return Vote::where('user_id', $user->id)->where('idea_id', $this->id)->exists();
    }

    public function vote(User $user)
    {
        Vote::create([
            'idea_id' => $this->id,
            'user_id' => $user->id
        ]);
    }

    public function removeVote(User $user)
    {
        $voteToDelete = Vote::where('idea_id', $this->id)
            ->where('user_id', $user->id)
            ->first();

        if ($voteToDelete) {
            $voteToDelete->delete();
        }

    }
}
