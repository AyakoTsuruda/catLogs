<?php
namespace App\Services;

use App\Contracts\Services\User as UserContracts;
use IteratorAggregate as PageCollection;
use App\Repositories\User as UserRepository;

/**
 * ユーザーサービスクラス
 */
class User implements UserContracts
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * メンバー一覧を取得する
     *
     * @param array $searches
     * @param bool $usePage
     * @return \IteratorAggregate
     */
    public function listOfMember(array $searches = [], bool $usePage = false): PageCollection
    {
        return $this->userRepository->listOfMember($searches, $usePage);
    }
}
