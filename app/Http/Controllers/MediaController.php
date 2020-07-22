<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MediaResource;
use App\Http\Resources\MediaResourceCollection;
use App\Media;

class MediaController extends Controller
{
    /**
     * @param Media $media
     * @return MediaResource
     */
    public function show(Media $media): MediaResource {
        return new MediaResource($media);
    }
    /**
     * @return MediaResourceCollection 
     */
    public function index(): MediaResourceCollection {
        return new MediaResourceCollection(Media::paginate());
    }
}
