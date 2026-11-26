<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // GET /api/users/{user} (Lihat detail user + koleksinya)
    public function show(User $user)
    {
        $user->load('media');
        return new UserResource($user);
    }

    // POST /api/users/{user}/collection (Custom Action: Tambah ke Koleksi)
    public function addToCollection(Request $request, User $user)
    {
        $request->validate([
            'media_id' => 'required|exists:media,id'
        ]);

        if ($user->media()->where('media_id', $request->media_id)->exists()) {
            return response()->json([
                'message' => 'Media sudah ada di dalam koleksi pengguna!'
            ], 409); // Error 409 Conflict
        }

        $user->media()->attach($request->media_id);

        return response()->json([
            'message' => 'Media berhasil ditambahkan ke koleksi.'
        ], 200);
    }

    // DELETE /api/users/{user}/collection/{mediaId} (Custom Action: Hapus dari Koleksi)
    public function removeFromCollection(User $user, $mediaId)
    {
        if (!$user->media()->where('media_id', $mediaId)->exists()) {
            return response()->json([
                'message' => 'Media tidak ditemukan di koleksi pengguna.'
            ], 404);
        }

        $user->media()->detach($mediaId);

        return response()->json([
            'message' => 'Media berhasil dihapus dari koleksi.'
        ], 200);
    }
}
