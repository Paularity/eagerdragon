<?php

use App\User;
use Illuminate\Database\Seeder;
use \Bouncer as Bounce;
class UsersWithProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $masterAdminAbilities = [
            'impersonate-user',
            'manage-app-settings',
            'manage-users',
            'manage-merchants',
            'manage-customers',
            'manage-languages',
            'manage-agents',
            'manage-processors',
            'configure-mids',
            'edit-fees',
            'view-audit-logs',
            'view-reports',
            'view-statements',
            'view-dashboard',
            'process-chargebacks',
            'use-virtual-terminal',
        ];

        $merchantAdminAbilities = [
            'view-reports',
            'process-chargebacks',
            'use-virtual-terminal',
        ];

        Bounce::role()->create([
            'name' => 'master-admin',
            'title' => 'Master Administrator'
        ]);

        Bounce::role()->create([
            'name' => 'merchant-admin',
            'title' => 'Merchant Administrator'
        ]);

        Bounce::role()->create([
            'name' => 'merchant',
            'title' => 'Merchant'
        ]);

        Bounce::role()->create([
            'name' => 'merchant-csr',
            'title' => 'Merchant CSR'
        ]);

        Bounce::role()->create([
            'name' => 'agent-admin',
            'title' => 'Agent Administrator'
        ]);

        Bounce::role()->create([
            'name' => 'agent',
            'title' => 'Agent'
        ]);

        User::unsetEventDispatcher();
        User::flushEventListeners();

        $user = User::create([
            'firstname' => 'Eagerdragon',
            'lastname' => 'Admin',
            'username' => 'eageradmin',
            'email' => 'eagerdragon@1minfunnel.com',
            'password' => bcrypt('eagerpassword'),
            'mobile_number' => '+6300',
            'status' => 1,
        ]);

        Bounce::assign('master-admin')->to($user);
        Bounce::allow($user)->to($masterAdminAbilities);

        $user = User::create([
            'firstname' => 'Eagerdragon',
            'lastname' => 'Merchant',
            'username' => 'eagermerchant',
            'email' => 'merchant@1minfunnel.com',
            'password' => bcrypt('eagerpassword'),
            'mobile_number' => '+6200',
            'status' => 1,
        ]);

        Bounce::assign('merchant-admin')->to($user);
        Bounce::allow($user)->to($merchantAdminAbilities);
    }
}