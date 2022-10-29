<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Facades\App\Contracts\Services\User as UserService;
use Inertia\Inertia;
use App\Models\User as UserModel;

/**
 * アカウント管理
 */
class AccountController extends Controller
{

    /**
     * アカウント一覧
     *
     * @param Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $accounts = UserService::listOfMember($request->all(), true);
        return Inertia::render('Administrator/Account/Index', [
            'accounts' => $accounts,
        ]);
    }

}
