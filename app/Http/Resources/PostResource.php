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
            'posted_by'=> $this->posted_by,
            'title'=>$this->title,
            'description'=>$this->description,
            'post_id'=>$this->id,
            'creator_info'=>[
                'id'=>$this->user? $this->user->id: 'not exist' ,
                'creator_name'=>$this->user? $this->user->name: 'not exist',
                'creator_email'=>$this->user? $this->user->email: 'not exist',
            ]
        ];
    }
}
