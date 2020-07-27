<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MediaResource;
use App\Http\Resources\MediaResourceCollection;
use App\Media;
use Storage;

class MediaController extends Controller
{
    /**
     * @param Media $medium
     * @return MediaResource
     */
    public function show(Media $medium) {
        return new MediaResource($medium);
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
            'file' => 'required',
            'filename' => 'required',
            'desc' => 'required',
        ]);
        $path = $request->file('file')->store(
            'files',
            's3'
        );
        $media = Media::create([
            'filename' => $request->filename,
            's3url' => Storage::disk('s3')->url($path),
            'desc' => $request->desc,
            ]);
        return new MediaResource($media);
    }
    /**
     * @param Media $medium
     * @param Request $request
     * @return MediaResource
     */
    public function update(Media $medium, Request $request):MediaResource {
        $medium->update($request->all());
        return new MediaResource($medium);
    }
    /**
     * @param Media $medium
     * @return \Illuminate\Http\JsonResonse
     * @throws \Exception
     */
    public function destroy(Media $medium) {
        $medium->delete();
        return response()->json();
    }
}
