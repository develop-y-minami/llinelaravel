<?php

namespace App\Http\Controllers\Webs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Webs\LineAccountStatusServiceInterface;
use App\Services\Webs\LineServiceInterface;
use App\Services\Webs\UserServiceInterface;
use App\Objects\Pages\LineInfoPage;
use App\Objects\Pages\LineOneToOnePage;

/**
 * LineController
 * 
 */
class LineController extends Controller
{
    /**
     * LineAccountStatusServiceInterface
     * 
     */
    private $lineAccountStatusService;
    /**
     * LineServiceInterface
     * 
     */
    private $lineService;
    /**
     * UserServiceInterface
     * 
     */
    private $userService;

    /**
     * __construct
     * 
     * @param LineAccountStatusServiceInterface lineAccountStatusService
     * @param LineServiceInterface              lineService
     * @param UserServiceInterface              userService
     */
    public function __construct(
        LineAccountStatusServiceInterface $lineAccountStatusService,
        LineServiceInterface $lineService,
        UserServiceInterface $userService
    )
    {
        $this->lineAccountStatusService = $lineAccountStatusService;
        $this->lineService = $lineService;
        $this->userService = $userService;
    }

    /**
     * １対１トークページ
     * HTTP Method Get
     * https://{host}/line/one-to-one
     * 
     * @param Request request リクエスト
     * @return View
     */
    public function oneToOne(Request $request) {
        try
        {
            // LINEアカウント状態セレクトボックス設定データを取得
            $lineAccountStatusSelectItems = $this->lineAccountStatusService->getSelectItems(\LineAccountType::ONE_TO_ONE);
            // 担当者セレクトボックス設定データを取得
            $userSelectItems = $this->userService->getSelectItems();

            // 返却データに設定
            $result = new LineOneToOnePage(\LineAccountType::ONE_TO_ONE, $lineAccountStatusSelectItems, $userSelectItems);

            return view('pages.lineOneToOne')->with('data', $result);
        }
        catch (\Exception $e)
        {
            throw $e;
        }
    }

    /**
     * LINE情報ページ
     * HTTP Method Get
     * https://{host}/line/info/{id}
     * 
     * @param Request request リクエスト
     * @param string  id      ID
     * @return View
     */
    public function info(Request $request, $id) {
        try
        {
            // LINE情報を取得
            $line = $this->lineService->getLine((int)$id);
            // 担当者セレクトボックス設定データを取得
            $userSelectItems = $this->userService->getSelectItems();

            // 返却データに設定
            $result = new LineInfoPage($line, $userSelectItems);

            return view('pages.lineInfo')->with('data', $result);
        }
        catch (\Exception $e)
        {
            throw $e;
        }
    }
}
