<?php

namespace Tests\Unit\Services;

use App\Services\User;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection as DataCollection;
use Mockery as M;
use App\Repositories\User as UserRepository;
use App\Models\{
    User as UserModel
};

/**
 * ユーザー機能サービスクラス
 */
class UserTest extends TestCase
{
    /**
     * メンバー一覧を取得するテスト
     *
     * @return void
     */
    public function testListOfMember(): void
    {
        $repo = M::mock(UserRepository::class, function($mock) {
            $mock->shouldReceive('listOfMember')
                ->with(M::type('array'), M::type('bool'))
                ->once()
                ->andReturn(M::mock(DataCollection::class));
        })->makePartial();

        $actual = (new User($repo))->listOfMember([]);
        $this->assertInstanceOf(DataCollection::class, $actual);
    }
}
