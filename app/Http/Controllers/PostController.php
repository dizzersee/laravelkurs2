<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use App\Notifications\NewPostNotification;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getCreatePost()
    {
        return view('create_post');
    }

    public function postCreatePost(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:'.Post::MAX_TITLE_LENGTH.'|string',
            'content' => 'required|min:10|max:'.Post::MAX_CONTENT_LENGTH.'|string',
        ]);

        $title = $request->input('title');
        $content = $request->input('content');

        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = 1;
        $post->save();

        return redirect()->route('view-post', ['id' => $post->id]);

    }

    public function createPostOld()
    {
        $post = new Post();
        $post->title = 'Neuer Post vom User 1';
        $post->content = 'Lorem Ipsum Dolor';
        // $post->save();

        $user = User::find(1);
        $user->posts()->save($post);

        $topics = Topic::all();
        $post->topics()->attach($topics);

        $post->topics()->detach(1);

        return 'Post erfolgreich erstellt!';
    }

    public function createPost2()
    {
        Post::create([
            'title' => 'Neuer Post von createPost2',
            'content' => 'Lorem Ipsum Dolor',
        ]);

        return 'Post erfolgreich erstellt!';
    }

    public function viewAllPosts(Request $request)
    {

        $sort = $request->input('sort', 'asc');

        if ($sort == 'asc') {
            $posts = Post::orderBy('id', 'asc')->with('user')->get();

        } elseif ($sort == 'desc') {
            $posts = Post::orderBy('id', 'desc')->with('user')->get();
        } else {
            $posts = Post::with('user')->all();
        }

        return view('all_posts', [
            'posts' => $posts,
        ]);
    }

    public function viewPost($id)
    {
        $post = Post::find($id);
        $topics = $post->topics;

        return view('post_view', [
            'post' => $post,
            'topics' => $topics,
        ]);
    }

    public function tests()
    {
        $user = User::find(1);
        $user->notify(new NewPostNotification());

        return 'Test';
    }
}
