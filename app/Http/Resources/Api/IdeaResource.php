<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class IdeaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // converts a singular word 'Vote' string to its plural form 'Votes'
        $pluralFormVote = Str::plural('Vote', $this->votes_count);

        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'created_date' => $this->created_at->diffForHumans(),
            'category' => $this->category->name,
            'user_name' => $this->user->name,
            'number_of_votes' => $this->votes_count, // this is the number of related votes in the current idea
            'vote_plural_form' => $pluralFormVote
        ];
    }
}
