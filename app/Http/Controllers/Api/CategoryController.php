<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            Category::all(), 
            HttpResponse::HTTP_OK
        );
    }

    public function store(CategoryRequest $request): JsonResponse
    {
        $category = Category::create($request->all());

        return response()->json(
            $category, 
            HttpResponse::HTTP_CREATED
        );
    }

    public function show(Category $category): JsonResponse
    {
        return response()->json(
            $category, 
            HttpResponse::HTTP_OK
        );
    }

    public function update(
        CategoryRequest $request, 
        Category $category
    ): JsonResponse {
        $category->update($request->all());

        return response()->json(
            $category, 
            HttpResponse::HTTP_OK
        );
    }

    public function destroy(Category $category): HttpResponse
    {
        $category->delete();

        return response()->noContent();
    }
}
