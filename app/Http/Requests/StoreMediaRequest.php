<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isPatch = $this->isMethod('PATCH');

        return [
            'title' => $isPatch ? 'sometimes|string|max:255' : 'required|string|max:255',
            'type' => $isPatch ? 'sometimes|in:Anime,Manga,Drama,Light Novel' : 'required|in:Anime,Manga,Drama,Light Novel',
            'score' => 'sometimes|numeric|min:0|max:10',
            'year' => 'sometimes|integer|min:1900|max:2030',
            'creator' => 'nullable|string|max:255',
            'total_count' => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul media wajib diisi.',
            'type.required' => 'Jenis media wajib diisi (Anime, Manga, Drama, Light Novel).',
            'type.in' => 'Jenis media harus salah satu dari: Anime, Manga, Drama, Light Novel.',
            'score.max' => 'Skor maksimal adalah 10.0.',
        ];
    }
}
