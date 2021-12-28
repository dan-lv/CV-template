<?php

namespace App\Http\Controllers\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(CategoryRepository $categoryRepository)
    {
        $userId = Auth::user()->id;

        $categoryList = $categoryRepository->getManyBy('user_id', $userId);

        return view('post')->with([
            'categoryList' => $categoryList
        ]);
    }

    public function savePost(Request $request, PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $userId = Auth::user()->id;
        $params = $request->validate([
            'title' => ['required'],
            'category_id' => ['required'],
            'content' => ['required']
        ]);
        $params['user_id'] = $userId;

        $result = $postRepository->create($params);
        $categoryList = $categoryRepository->getManyBy('user_id', $userId);

        $status = $result ? 'success' : 'error';
 
        return view('post')->with([
            'status' => $status,
            'categoryList' => $categoryList
        ]);
    }

    public function generatePost($userId, $postId, PostRepository $postRepository, UserRepository $userRepository)
    {
        $userRepository->findOrFail($userId);
        $post = $postRepository->getPostByUserAndPostId($userId, $postId);
        if (empty($post)) return abort(404);

        return view('user.userPost')->with([
            'userPost' => $post
        ]);
    }
}
