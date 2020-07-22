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
    /**
     * @param Request $request
     * @return MediaResource
     */
    public function store(Request $request) {
        $request->validate([
            'filename' => 'required',
            'desc' => 'required',
            's3url' => 'required',
        ]);
        $media = Media::create($request->all());
        return new MediaResource($media);
    }
}
