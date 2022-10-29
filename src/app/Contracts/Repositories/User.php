<?php
namespace App\Contracts\Repositories;

use IteratorAggregate as PageCollection;

/**
 * ユーザーデータ機能インタフェース
 */
interface User
{
    /**
     * メンバー一覧を取得する
     *
     * @param array $searches
     * @param bool $usePage
     * @return \IteratorAggregate
     */
    public function listOfMember(array $searches = [], bool $usePage = false): PageCollection;

}
