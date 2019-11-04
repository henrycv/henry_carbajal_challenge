<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'twitter_id' => $this->twitter_id,
            'twitter_username' => $this->twitter_username,
            'user' => $this->user,
            'hidden' => $this->hidden,
          ];
    }
}
