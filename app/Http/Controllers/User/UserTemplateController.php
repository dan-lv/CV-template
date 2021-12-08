<?php

namespace App\Http\Controllers\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserInfoCvRepository;
use Illuminate\Support\Facades\Auth;

class UserTemplateController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generateTemplate($id, UserInfoCvRepository $userInfoCvRepository)
    {
        $userId = Auth::user()->id;

        $userInfoData = $userInfoCvRepository->getFirstBy('user_id', $userId)->toArray();

        $data = array_merge($userInfoData, [
            'templateId' => $id,
            'createCv' => true
        ]);

        return view('dashboard')->with($data);
    }

    public function createCv(Request $request, UserInfoCvRepository $userInfoCvRepository, $templateId)
    {
        $params = $request->input();

        $userId = Auth::user()->id;

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

        $data = array_merge($userInfoData, [
            'templateId' => $templateId,
            'createCv' => false
        ]);

        return view('user.cv')->with($data);
    }
}
