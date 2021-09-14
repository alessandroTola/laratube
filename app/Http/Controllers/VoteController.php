<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class VoteController extends Controller
{


    public function vote($entityId, $type)
    {
        $entity = $this->getEntity($entityId);

        return auth()->user()->toggleVote($entity, $type);
    }

    public function getEntity($entityId)
    {
        $video = Video::find($entityId);

        if ($video) return $video;

        throw new ModelNotFoundException('Entity not found.');
    }
}