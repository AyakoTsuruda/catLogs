<?php
namespace App\Repositories;

use App\Contracts\Repositories\User as UserContracts;
use IteratorAggregate as PageCollection;
use App\Models\{
    User as UserModel
};

/**
 * ユーザーデータ操作リポジトリ
 */
class User implements UserContracts
{

    /**
     * メンバー一覧を取得する
     *
     * @param array $searches
     * @param bool $usePage
     * @return \IteratorAggregate
     */
    public function listOfMember(array $searches = [], bool $usePage = false): PageCollection
    {
        $query = UserModel::select('*');

        !empty($searches['name']) && $query->matchPartialName($searches['name']);
        !empty($searches['email']) && $query->matchPartialEmail($searches['email']);

        return $usePage ? $query->paginate() : $query->get();
    }

}
