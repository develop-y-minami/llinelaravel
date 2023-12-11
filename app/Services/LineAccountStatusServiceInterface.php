<?php

namespace App\Services;

/**
 * LineAccountStatusServiceInterface
 * 
 */
interface LineAccountStatusServiceInterface
{
    /**
     * LINEアカウント状態セレクトボックスに設定するデータを返却
     * 
     * @param int lineAccountTypeId LINEアカウント種別
     * @return array 選択項目
     */
    public function getSelectItems($lineAccountTypeId = null);
}