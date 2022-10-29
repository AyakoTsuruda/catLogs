<?php

namespace Tests\Unit\Repositories;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection as DataCollection;
use IteratorAggregate as PageCollection;
use App\Repositories\User as UserRepository;
use App\Models\{
    User as UserModel
};

/**
 * ユーザーデータ操作リポジトリテスト
 */
class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * メンバー一覧を取得するテスト
     *
     * @return void
     */
    public function testListOfMember(): void
    {
        $users = UserModel::factory(3)->create();

        // 検索条件なし
        $actual = (new UserRepository)->listOfMember();
        $this->assertInstanceOf(DataCollection::class, $actual);
        $this->assertCount(3, $actual);
        $this->assertInstanceOf(UserModel::class, $actual->first());

        // name指定
        $actual = (new UserRepository)->listOfMember(['name' => mb_substr($users->get(1)->name, 1, -1)]);
        $this->assertCount(1, $actual);
        $this->assertEquals($users->get(1)->id, $actual->first()->id);

        // email指定
        $actual = (new UserRepository)->listOfMember(['email' => mb_substr($users->get(1)->email, 1, -1)]);
        $this->assertCount(1, $actual);
        $this->assertEquals($users->get(1)->id, $actual->first()->id);

        // 全ての条件を指定
        $actual = (new UserRepository)->listOfMember([
            'name' => mb_substr($users->get(1)->name, 1, -1),
            'email' => mb_substr($users->get(1)->email, 1, -1),
        ]);
        $this->assertCount(1, $actual);
        $this->assertEquals($users->get(1)->id, $actual->first()->id);

        // PageCollection指定
        $actual = (new UserRepository)->listOfMember([], true);
        $this->assertInstanceOf(PageCollection::class, $actual);
    }



}
