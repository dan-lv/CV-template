<?php

namespace App\Http\Controllers\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('category');
    }

    public function saveCategory(Request $request, CategoryRepository $categoryRepository)
    {
        $userId = Auth::user()->id;
        $params = $request->validate([
            'title' => ['required']
        ]);
        $params['user_id'] = $userId;

        $result = $categoryRepository->create($params);

        $status = $result ? 'success' : 'error';

        return view('category')->with([
            'status' => $status
        ]);
    }
}
