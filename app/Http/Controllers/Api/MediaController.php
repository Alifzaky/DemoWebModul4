<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    // GET /api/media (Dukungan pencarian & filter tipe)
    public function index(Request $request)
    {
        $query = Media::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        $media = $query->paginate(10);
        return MediaResource::collection($media);
    }

    // POST /api/media
    public function store(StoreMediaRequest $request)
    {
        $media = Media::create($request->validated());
        return (new MediaResource($media))->response()->setStatusCode(201);
    }

    // GET /api/media/{id}
    public function show($id)
    {
        $media = Media::with('users')->findOrFail($id);
        return new MediaResource($media);
    }

    // PATCH /api/media/{id}
    public function update(StoreMediaRequest $request, $id)
    {
        $media = Media::findOrFail($id);
        $media->update($request->validated());
        return new MediaResource($media);
    }

    // DELETE /api/media/{id}
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        return response()->json(['message' => 'Media berhasil dihapus dari sistem.'], 200);
    }
}
