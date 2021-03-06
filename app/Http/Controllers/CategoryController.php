<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Str;

class CategoryController extends Controller
{
    public function index($alias)
    {
        $title = 'Category';
        $postsWeek = Post::with('categories')
            ->where('updated_at', '>=', Carbon::now()->startOfWeek())
            ->orderBy('weekly_views', 'desc')
            ->limit(4)
            ->get();
        $categories = Category::where('alias', Str::slug($alias))
            ->firstOrFail();

        $posts = Category::find($categories->id)
            ->post()
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $kateg = Category::all();
        if ($posts->isEmpty()) {
            return redirect('/blog')->with(['pesan' => 'Tidak Ada artikel untuk kategori ' . $categories->name]);
            # code...
        } else {
            return view('frontend.category.index', compact('posts', 'categories', 'title', 'postsWeek', 'kateg'));
        }
    }
}