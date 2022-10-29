<?php
namespace App\Contracts\Services;

use IteratorAggregate as PageCollection;

interface User {

    /**
     * メンバー一覧を取得する
     *
     * @param array $searches
     * @param bool $usePage
     * @return \IteratorAggregate
     */
    public function listOfMember(array $searches = [], bool $usePage = false): PageCollection;
}
