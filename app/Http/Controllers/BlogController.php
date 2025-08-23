<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Helpers\Mapped;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $blogCategory = $request->query('cat');
            $orderBy = $request->query('ord');

            $blogs = Blog::with('blogCategory')
                ->when($blogCategory, function ($query, $blogCategory) {
                    return $query->whereHas('blogCategory', function ($q) use ($blogCategory) {
                        return $q->where('slug', $blogCategory);
                    });
                })
                ->when($orderBy === 'old', fn($query) => $query->orderBy('created_at'))
                ->when($orderBy === 'new', fn($query) => $query->orderByDesc('created_at'))
                ->paginate(5);

            $blogs = $blogs->getCollection()->transform(function ($blog) {
                return Mapped::blogMap($blog);
            });

            return ApiResponse::success($blogs, 'Succesfully Get All Blogs Data');
        } catch (\Throwable $th) {
            return ApiResponse::error('Something went wrong', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        try {
            $blog = Blog::with('blogCategory')->where('slug', $slug)->first();

            $blog = Mapped::blogMap($blog);

            return ApiResponse::success($blog, 'Successfully Retrieve Blog Data');
        } catch (\Throwable $th) {
            return ApiResponse::error('Something went wrong', $th->getMessage());
        }
    }
}
