<?php

namespace Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\{
    User as UserModel
};

/**
 * ユーザーモデルテスト
 */
class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 名前部分一致検索スコープ
     *
     * @return void
     */
    public function testScopeMatchPartialName(): void
    {
        $users = UserModel::factory(3)->create();

        $actual = UserModel::matchPartialName(mb_substr($users->get(1)->name, 1, -1))->get();

        $this->assertCount(1, $actual);
        $this->assertEquals($users->get(1)->id, $actual->first()->id);
    }

    /**
     * メールアドレス部分一致検索スコープテスト
     *
     * @return void
     */
    public function testScopeMatchPartialEmail(): void
    {
        $users = UserModel::factory(3)->create();

        $actual = UserModel::matchPartialEmail(mb_substr($users->get(1)->email, 1, -1))->get();

        $this->assertCount(1, $actual);
        $this->assertEquals($users->get(1)->id, $actual->first()->id);
    }
}
