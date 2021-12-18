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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserTemplateController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generateTemplate($id, UserInfoCvRepository $userInfoCvRepository)
    {
        $userId = Auth::user()->id;

        $userInfoData = optional($userInfoCvRepository->getFirstBy('user_id', $userId))->toArray();

        if (empty($userInfoData)) {
            $data = [
                'templateId' => $id,
                'createCv' => true
            ];
        } else {
            $data = array_merge($userInfoData, [
                'templateId' => $id,
                'createCv' => true
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
            'userName' => $userName,
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

    public function generateCv(UserRepository $userRepository, UserInfoCvRepository $userInfoCvRepository, $userName, $templateId)
    {
        $userId = $userRepository->getFirstBy('name', $userName)->id;
        $userInfoData = $userInfoCvRepository->getFirstBy('user_id', $userId)->toArray();
        $storagePath = 'images/avatar/' . $userId;

        $userInfoData['avatar_url'] = $storagePath . '/' . $userInfoData['avatar_url'];
        if (Auth::guard('admin')->check()) {
            $data = array_merge($userInfoData, [
                'templateId' => $templateId,
                'createCv' => true,
                'isAdmin' => true,
                'userId' => $userId
            ]);
        } else {
            $data = array_merge($userInfoData, [
                'templateId' => $templateId,
                'createCv' => false
            ]);
        }

        return view('user.cv')->with($data);
    }

    public function searchCv(Request $request, UserRepository $userRepository)
    {
        $params = $request->input();

        $user = $userRepository->getFirstBy('name', $params['search_by_user_name']);
        
        $userName = empty($user) ? null : $params['search_by_user_name'];

        // dd($userName);
        return view('searchResult')->with([
            'userName' => $userName
        ]);
    }
}
