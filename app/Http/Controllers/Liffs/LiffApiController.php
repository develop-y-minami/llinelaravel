<?php

namespace App\Http\Controllers\Liffs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VerifyServiceProviderRequest;
use App\Services\Liffs\LiffApiServiceInterface;

/**
 * LiffApiController
 * 
 * LIFF Api
 * 
 */
class LiffApiController extends Controller
{
    /**
     * LiffApiService
     * 
     */
    private $liffApiService;

    /**
     * __construct
     * 
     * @param LiffApiServiceInterface liffApiService
     */
    public function __construct(LiffApiServiceInterface $liffApiService)
    {
        $this->liffApiService = $liffApiService;
    }
    
    /**
     * サービス提供者情報.提供者IDを確認する
     * HTTP Method Post
     * https://{host}/liff/api/verify/serviceProvider
     * 
     * @param VerifyServiceProviderRequest request リクエスト
     * @return Json
     */
    public function verifyServiceProvider(VerifyServiceProviderRequest $request)
    {
        try
        {
            // パラメータを取得
            $providerId = $request->input('providerId');

            // HTTPステータスコード:200 
            return $this->jsonResponse([]);
        }
        catch (\Exception $e)
        {
            throw $e;
        }
    }
}
