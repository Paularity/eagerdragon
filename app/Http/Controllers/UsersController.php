<?php

namespace App\Http\Controllers;

use Bouncer;
use App\Role;
use App\User;
use App\AgentCSR;
use Carbon\Carbon;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('manageUsers')
            ->except(['edit', 'update', 'profile']);
    }

    public function index()
    {
        $users = User::where('id', '<>', Auth::user()->id)
            ->with('roles')->paginate(10);

        $this->setTemplateVars();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $this->setTemplateVars();

        return view('user.create');
    }

    public function store(CreateUserRequest $request)
    {
        $request->merge(['password' => bcrypt(mt_rand(000000, 999999))]);

        $user = User::create($request->all());

        Bouncer::assign($request->role)->to($user);
        Bouncer::allow($user)->to($request->abilities);
        Bouncer::allow($user)->toManage($user);

        return redirect()->back()->with('success',
            'New user added successfully!'
        );
    }

    public function edit(User $user)
    {
        if (!Bouncer::allows('manage-users') &&
            !Bouncer::allows('edit', $user)
            ) {
            abort(403);
        }

        $user->role = $user->roles()->get(['name'])[0]->name;

        $this->setTemplateVars($user);

        return view('user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request)
    {
        $user = User::findOrFail($request->user_id);

        if (!Bouncer::allows('manage-users') &&
            !Bouncer::allows('update', $user)
            ) {
            abort(403);
        }

        if (!Bouncer::allows('manage-users') &&
            !Bouncer::allows('edit', $user)
            ) {
            abort(403);
        }

        $abilitiesUpdate = $this->updateUserAbilites($user, $request);
        $roleUpdate = $this->updateUserRole($user, $request);

        if ($abilitiesUpdate || $roleUpdate) {
            $request->merge(['audited_at' => Carbon::now()]);
        }

        $user->update($request->all());

        return redirect()->back()->with('success',
            'User was updated successfully!'
        );
    }

    public function show(User $user)
    {
        $user->role = $user->roles()->get(['name'])[0]->name;

        $this->setTemplateVars($user);

        return view('user.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success',
            'User was deleted successfully!'
        );
    }

    public function profile()
    {
        $user = User::where('id', Auth::user()->id)
            ->with('roles')->firstOrFail();

        if (!Bouncer::allows('manage-users') &&
            !Bouncer::allows('view', $user)
            ) {
            abort(403);
        }

        $role = $user->roles()->get(['name'])[0]->name;

        if ($role === 'agent'|| $role == 'merchant') {
            $view = sprintf('%s.show', $role);
        } else {
            $view = 'user.show';
        }

        $this->setTemplateVars($user);

        return view($view, compact('user'));
    }

    public function updateUserRole($user , $request)
    {
        $oldRole = $user->roles()->get(['name'])[0]->name;
        $newRole = $request->role;

        if ($oldRole !== $newRole) {
            Bouncer::retract($oldRole)->from($user);
            Bouncer::assign($newRole)->to($user);
            Bouncer::refreshFor($user);

            request()->offsetSet('oldRole', $oldRole);

            return true;
        }

        request()->offsetUnset('role');

        return false;
    }

    public function updateUserAbilites($user, $request)
    {
        $currentUserAbilities = $this->getUserAbilitiesArray($user);
        $newUserAbilities = $request->abilities;
        $presetAbilities = (new User())->getPresetAbilities();

        foreach($currentUserAbilities as $key => $ability) {
            if (!in_array($ability, $presetAbilities)) {
                unset($currentUserAbilities[$key]);
            }
        }
        sort($currentUserAbilities);
        sort($newUserAbilities);

        if ($currentUserAbilities !== $newUserAbilities) {
            foreach ($currentUserAbilities as $ability) {
                Bouncer::disallow($user)->to($ability);
            }

            Bouncer::allow($user)->to($request->abilities);
            Bouncer::refreshFor($user);

            request()->offsetSet('oldAbilities', $currentUserAbilities);

            return true;
        }

        request()->offsetUnset('abilities');

        return false;
    }

    public function approveAccount(User $user)
    {
        $user->update(request()->all());

        return redirect()->back()->with('success',
            'User account was approved!'
        );
    }

    private function setTemplateVars($user = null)
    {
        $userAbilities = $this->getUserAbilitiesArray($user);

        $userPresetStatus = array_flip((new User())->getPresetSTatus());

        $presetAbilities = (new User())->getPresetAbilities();

        $rolesList = Role::all(['id', 'name', 'title']);

        \View::share('rolesList', $rolesList);
        \View::share('userPresetStatus', $userPresetStatus);
        \View::share('presetAbilities', $presetAbilities);
        \View::share('userAbilities', $userAbilities);
    }

    public function getUserAbilitiesArray($user)
    {
        if (!$user) {
            return [];
        }

        return collect($user->getAbilities())->map(function($ability, $key) {
                return $ability->name;
            })->toArray();
    }
}