<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserInfoCvRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        

        return view('admin.dashboard');
    }

    public function createCv(Request $request, UserInfoCvRepository $userInfoCvRepository, $templateId)
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

        $userInfoCvRepository->updateOrCreate($params, ['user_id' => $userId]);

        return redirect()->route('userCv', [
            'userId' => $userId,
            'templateId' => $templateId
        ]);
    }

    public function generateCv($userId, $templateId, UserInfoCvRepository $userInfoCvRepository)
    {
        $userInfoData = $userInfoCvRepository->getFirstBy('user_id', $userId)->toArray();
        $storagePath = 'images/avatar/' . $userId;

        $userInfoData['avatar_url'] = $storagePath . '/' . $userInfoData['avatar_url'];
        $data = array_merge($userInfoData, [
            'templateId' => $templateId,
            'createCv' => false
        ]);

        return view('user.cv')->with($data);
    }
}
