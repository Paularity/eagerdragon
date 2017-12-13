<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Search\User\SearchUser;
use App\Search\Merchant\SearchMerchant;

class SearchController extends Controller
{
    public function users(Request $request)
    {
        $users = SearchUser::filter($request);

        $oldInputs = $request->all();

        $this->setTemplateVars();

        return view('user.index', compact('users', 'oldInputs'));
    }

    public function merchants(Request $request)
    {
        $merchants = SearchMerchant::filter($request);

        $oldInputs = $request->all();

        $this->setTemplateVars();

        return view('merchant.index', compact('merchants', 'oldInputs'));
    }

    private function setTemplateVars()
    {
        $userPresetStatus = array_flip((new User())->getPresetSTatus());

        $rolesList = Role::all(['id', 'name', 'title']);

        \View::share('rolesList', $rolesList);
        \View::share('userPresetStatus', $userPresetStatus);
    }
}
