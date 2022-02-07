<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;

class GenreController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            Genre::all(), 
            HttpResponse::HTTP_OK
        );
    }

    public function store(GenreRequest $request): JsonResponse
    {
        $genre = Genre::create($request->all());

        return response()->json(
            $genre, 
            HttpResponse::HTTP_CREATED
        );
    }

    public function show(Genre $genre): JsonResponse
    {
        return response()->json(
            $genre, 
            HttpResponse::HTTP_OK
        );
    }

    public function update(
        GenreRequest $request, 
        Genre $genre
    ): JsonResponse {
        $genre->update($request->all());

        return response()->json(
            $genre, 
            HttpResponse::HTTP_OK
        );
    }

    public function destroy(Genre $genre): HttpResponse
    {
        $genre->delete();

        return response()->noContent();
    }
}
