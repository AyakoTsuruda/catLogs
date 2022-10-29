<?php
namespace App\Models\Trait\Scope;

use Illuminate\Database\Eloquent\Builder;

/**
 * ユーザーモデル ScopeTrait
 */
trait User {

    /**
     * 名前検索スコープ
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMatchPartialName(Builder $query, string $name): Builder
    {
        return $query->where('name', 'LIKE', "%$name%");
    }

    /**
     * メールアドレス検索スコープ
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $email
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMatchPartialEmail(Builder $query, string $email): Builder
    {
        return $query->where('email', 'LIKE', "%$email%");
    }
}
