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

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

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

    public function manageCategory()
    {
        $userId = Auth::user()->id;

        $categoryList = $this->categoryRepository->getManyBy('user_id', $userId);

        return view('manageCategory')->with([
            'categoryList' => $categoryList
        ]);
    }

    public function editCategory($categoryId)
    {
        $category = $this->categoryRepository->findOrFail($categoryId);

        return view('editCategory')->with([
            'category' => $category
        ]);
    }

    public function updateCategory(Request $request, $categoryId)
    {
        $params = $request->validate([
            'title' => ['required']
        ]);

        $category = $this->categoryRepository->find($categoryId);
        $result = $this->categoryRepository->update($category, $params);

        $status = $result ? 'success' : 'error';

        return view('editCategory')->with([
            'status' => $status,
            'category' => $category
        ]);
    }

    public function deleteCategory($categoryId)
    {
        $result = $this->categoryRepository->delete($categoryId);

        $result ? session()->flash('deleteStatus', 'success') : session()->flash('deleteStatus', 'error');

        return redirect()->route('manageCategory');
    }
}
