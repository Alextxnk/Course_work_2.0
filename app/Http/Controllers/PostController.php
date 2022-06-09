<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Post;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */

    public function index(Request $request)
    {
        if ($request->search) {
            $posts = DB::table('posts')
                ->join('users', 'posts.user_id', '=', 'users.user_id')
                ->where('post_name','like', '%' . $request->search . '%')
                ->orWhere('salary','like', '%' . $request->search . '%')
                ->get();
            return view('posts.index', compact('posts'));
        }

        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.user_id')
            ->paginate(4);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */

    public function create()
    {
        $users = User::all();

        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostStoreRequest $request
     * @return RedirectResponse
     */

    public function store(PostStoreRequest $request)
    {
        /*Post::create([
           'post_name' => $request->post_name,
            'salary' => $request->salary,
        ]);*/

        Post::create($request->validated());

        return redirect()->route('post.index')->with('message', 'Post Add Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */

    public function edit(int $id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(PostUpdateRequest $request, int $id)
    {
        $post = Post::find($id);
        $post->update([
            'salary' => $request->salary,
        ]);

        return redirect()->route('post.index')->with('message', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */

    public function destroy(int $id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('post.index')->with('message', 'Post Deleted Successfully');
    }
}
