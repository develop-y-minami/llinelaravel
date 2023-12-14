<?php

namespace App\Http\Controllers\Webs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\Webs\LineNoticeTypeServiceInterface;
use App\Services\Webs\UserServiceInterface;
use App\Objects\Pages\TopPage;

/**
 * TopController
 * 
 */
class TopController extends Controller
{
    /**
     * LineNoticeTypeServiceInterface
     * 
     */
    private $lineNoticeTypeService;
    /**
     * UserServiceInterface
     * 
     */
    private $userService;

    /**
     * __construct
     * 
     * @param LineNoticeTypeServiceInterface lineNoticeTypeService
     * @param UserServiceInterface userService
     */
    public function __construct(
        LineNoticeTypeServiceInterface $lineNoticeTypeService,
        UserServiceInterface $userService
    )
    {
        $this->lineNoticeTypeService = $lineNoticeTypeService;
        $this->userService = $userService;
    }

    /**
     * トップページ
     * HTTP Method Get
     * https://{host}
     * 
     * @param Request request リクエスト
     * @return View
     */
    public function index(Request $request) {
        try
        {
            // 通知日の初期値を設定
            $lineNoticeDate = Carbon::now()->toDateString();
            // 通知種別セレクトボックス設定データを取得
            $lineNoticeTypeSelectItems = $this->lineNoticeTypeService->getSelectItems();
            // 担当者セレクトボックス設定データを取得
            $userSelectItems = $this->userService->getSelectItems();

            // 返却データに設定
            $result = new TopPage($lineNoticeDate, $lineNoticeTypeSelectItems, $userSelectItems);

            return view('pages.top')->with('data', $result);
        }
        catch (\Exception $e)
        {
            throw $e;
        }
    }
}
