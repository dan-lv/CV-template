<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserInfoCvRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $userList = $this->userRepository->getAll();

        $data = [
            'userList' => $userList
        ];

        return view('layouts.admin.app')->with($data);
    }

    public function delete($userId)
    {
        $user = $this->userRepository->find($userId);

        $result = $this->userRepository->delete($user);

        return redirect()->route('admin.dashboard');
    }
}
