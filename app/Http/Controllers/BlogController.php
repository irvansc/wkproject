<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'blog';
        // Popular this week
        $postsWeek = Post::with('categories')
            ->where('updated_at', '>=', Carbon::now()->startOfWeek())
            ->orderBy('weekly_views', 'desc')
            ->limit(4)
            ->get();

        // // Trend category
        // $trendPosts = Category::firstWhere('alias')
        //     ->posts()
        //     ->orderBy('created_at', 'desc')
        //     ->limit(4)
        //     ->get();

        // Very interesting
        $interestingPosts = Post::with('categories')
            ->orderBy('views', 'desc')
            ->limit(4)
            ->get();
        $post = Post::with('categories')->get();
        $categories = Category::all();
        // Search
        if ($request->search) {
            $posts = Post::with('user')
                ->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('content', 'like', '%' . $request->search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(5)
                ->appends($request->query());

            return view('frontend.blog.index', compact(
                'title',
                'posts',
                'post',
                'categories',
                'postsWeek',
                'interestingPosts'
            ));
        }

        // All posts
        $posts = Post::with(['user', 'categories'])
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $post = Post::with('categories')->get();
        $categories = Category::all();
        return view('frontend.blog.index', compact(
            'title',
            'posts',
            'post',
            'categories',
            'postsWeek',
            'interestingPosts'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($alias)
    {
        $title = 'blog';
        $postsWeek = Post::with('categories')
            ->where('updated_at', '>=', Carbon::now()->startOfWeek())
            ->orderBy('weekly_views', 'desc')
            ->limit(4)
            ->get();
        $post = Post::where('alias', Str::slug($alias))
            ->firstOrFail();
        $comments = Post::find($post->id)
            ->comments
            ->where('status' == 'y');
        $categories = Post::find($post->id)
            ->categories;
        $kategori = Category::all();
        // Add a view
        $post->increment('views');

        // Add a view today
        if ($post->updated_at >= Carbon::today()) {
            $post->increment('views_today');
        } else {
            $post->views_today = 0;
            $post->update();
        }

        // Add a weekly view
        if ($post->updated_at >= Carbon::now()->startOfWeek()) {
            $post->increment('weekly_views');
        } else {
            $post->weekly_views = 0;
            $post->update();
        }
        return view('frontend.blog.detail', compact(
            'title',
            'post',
            'categories',
            'kategori',
            'postsWeek',
            'comments',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}