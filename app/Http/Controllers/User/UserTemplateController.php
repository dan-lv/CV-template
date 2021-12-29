<?php

namespace App\Http\Controllers\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserInfoCvRepository;
use App\Repositories\UserRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserTemplateController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generateTemplate($id, UserInfoCvRepository $userInfoCvRepository, CategoryRepository $categoryRepository)
    {
        if (!in_array($id, [1, 2])) return abort(404);

        $userId = Auth::user()->id;

        $userInfoData = optional($userInfoCvRepository->getFirstBy('user_id', $userId))->toArray();
        $categoryPost = $categoryRepository->getManyBy('user_id', $userId, ['posts']);

        if (empty($userInfoData)) {
            $data = [
                'templateId' => $id,
                'createCv' => true,
                'categoryPost' => $categoryPost,
                'userId' => $userId
            ];
        } else {
            $data = array_merge($userInfoData, [
                'templateId' => $id,
                'createCv' => true,
                'categoryPost' => $categoryPost,
                'userId' => $userId
            ]);
        }

        return view('dashboard')->with($data);
    }

    public function createCv(Request $request, UserRepository $userRepository, UserInfoCvRepository $userInfoCvRepository, $templateId)
    {
        $userId = Auth::user()->id;
        $params = $request->input();

        if ($request->hasFile('avatar_url')) {
            $avatar = $request->avatar_url;

            $fileName = $avatar->getClientOriginalName();
            $storagePath = 'avatar/' . $userId;
            Storage::putFileAs($storagePath, $avatar, $fileName);

            $params['avatar_url'] = $fileName;
        }

        unset($params['_token']);

        $userInfoCvRepository->updateOrCreate(['user_id' => $userId], $params);
        $userName = $userRepository->find($userId)->name;
        return redirect()->route('userCv', [
            'userName' => Str::slug($userName),
            'templateId' => $templateId
        ]);
    }

    public function createCvFromAdmin(Request $request, UserInfoCvRepository $userInfoCvRepository, $userId, $templateId)
    {
        $params = $request->input();

        if ($request->hasFile('avatar_url')) {
            $avatar = $request->avatar_url;

            $fileName = $avatar->getClientOriginalName();
            $storagePath = 'avatar/' . $userId;
            Storage::putFileAs($storagePath, $avatar, $fileName);

            $params['avatar_url'] = $fileName;
        }

        unset($params['_token']);

        $userInfoCvRepository->updateOrCreate(['user_id' => $userId], $params);

        return redirect()->route('userCv', [
            'userId' => $userId,
            'templateId' => $templateId
        ]);
    }

    public function generateCv(UserRepository $userRepository, UserInfoCvRepository $userInfoCvRepository, CategoryRepository $categoryRepository, $userName, $templateId)
    {
        if (!in_array($templateId, [1, 2])) return abort(404);
        $userName = str_replace('-', ' ', $userName);
        $userId = optional($userRepository->getFirstBy('name', $userName))->id;
        if (empty($userId)) return abort(404);
        $userInfoData = optional($userInfoCvRepository->getFirstBy('user_id', $userId))->toArray();
        if (empty($userInfoData)) return abort(404);
        $storagePath = 'images/avatar/' . $userId;
        $categoryPost = $categoryRepository->getManyBy('user_id', $userId, ['posts']);

        if (!empty($userInfoData['avatar_url'])) {
            $userInfoData['avatar_url'] = $storagePath . '/' . $userInfoData['avatar_url'];
        }
        if (Auth::guard('admin')->check()) {
            $data = array_merge($userInfoData, [
                'templateId' => $templateId,
                'createCv' => true,
                'isAdmin' => true,
                'userId' => $userId,
                'categoryPost' => $categoryPost
            ]);
        } else {
            $data = array_merge($userInfoData, [
                'templateId' => $templateId,
                'createCv' => false,
                'categoryPost' => $categoryPost,
                'userId' => $userId
            ]);
        }

        return view('user.cv')->with($data);
    }

    public function searchCv(Request $request, UserRepository $userRepository)
    {
        $params = $request->input();

        $user = $userRepository->getFirstBy('name', $params['search_by_user_name']);
        
        $userName = empty($user) ? null : $params['search_by_user_name'];

        return view('searchResult')->with([
            'userName' => $userName
        ]);
    }
}
