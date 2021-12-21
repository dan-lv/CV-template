<?php

namespace App\Http\Controllers\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('post');
    }

    public function savePost(Request $request, PostRepository $postRepository)
    {
        $userId = Auth::user()->id;
        $params = $request->input();
        $params['user_id'] = $userId;

        $result = $postRepository->create($params);

        $status = $result ? 'success' : 'error';
 
        return redirect()->route('createPost')->with([
            'status' => $status
        ]);
    }
}
