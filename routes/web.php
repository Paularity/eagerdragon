<?php

// Laravel's Authentication routes
Auth::routes();

/* === Public routes === */
Route::get('/leaveImpersonation', 'ImpersonateController@leave');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/inactive-account', 'DashboardController@inactiveAccount');

//Public Merchant Registration routes
Route::get('/merchant-registration', 'PublicMerchantAccountRegistration@index');
Route::post('/merchant-registration', 'PublicMerchantAccountRegistration@store');

//Public Agent Registration routes
Route::resource('agent-registration', 'PublicAgentAccountRegistrationController');

//Access Code routes
Route::get('/access-code', 'Auth\AccessCodesController@index');
Route::post('/access-code/verify', 'Auth\AccessCodesController@verify');
Route::get('/access-code/resend', 'Auth\AccessCodesController@resend');

//Transactions Custom Payment Page
Route::get('/transactions/{amount}/{merchant}/{redirect}', 'TransactionsController@createCustom');
Route::post('/transactions/custom', 'TransactionsController@customStore');

/* === Authenticated routes === */
Route::group(
    [
        'middleware' => [
            'auth',
            'activeAccount',
            'accessCodeProtection',
            'updatedUserPassword',
        ],
    ],
    function () {
        //Dashboard Routes
        Route::get('/dashboard', 'DashboardController@index');
        Route::get('/', function () {
            return redirect('/dashboard');
        });

        Route::get('/credentials', function() {
            return base64_encode(env('SAFARICOM_KEY').':'.env('SAFARICOM_SECRET'));
        });

        //User homepage route
        Route::get('/home', function () {
            return view('default-page');
        });

        //Settings Routes
        Route::resource('settings', 'SettingsController');
        Route::post('settingsLogo', 'SettingsController@logoUpdate');

        //Users Routes
        Route::get('users/profile', 'UsersController@profile');
        Route::post('users/{user}/approve-account', 'UsersController@approveAccount');
        Route::resource('users', 'UsersController');

        //Roles Routes
        Route::resource('roles', 'RolesController');

        //Impersonation Routes
        Route::get('/impersonate/{user}', 'ImpersonateController@impersonate');

        //Reports Routes
        Route::get('reports', 'ReportsController@index');
        Route::post('reports', 'ReportsController@generate');

        //Agent Account Routes
        Route::resource('agent-accounts', 'AgentAccountsController');

        //Agents CSR Routes
        Route::resource('agents-csr', 'AgentsCSRController');

        //Chargebacks Routes
        Route::get('/chargebacks/downloadzip/{id}', 'ChargebacksController@downloadZip');
        Route::get('/chargebacks/sendtobank/{id}', 'ChargebacksController@sendToBank');
        Route::post('/chargebacks/search', 'ChargebacksController@search');
        Route::post('/chargebacks/merchant', 'ChargebacksController@merchant');
        Route::resource('chargebacks', 'ChargebacksController');

        //Supporting Docs
        Route::resource(
            '/supporting-docs',
            'SupportingDocsController',
            [
                'only' => ['store', 'destroy'],
            ]
        );

        //Virtual Terminal Routes
        Route::post('/virtual-terminal/merchant', 'VirtualTerminalController@merchant');
        Route::resource('virtual-terminal', 'VirtualTerminalController');

        //Transactions
        Route::post('/transactions/merchant', 'TransactionsController@merchant');
        Route::post('transactions/search', 'TransactionsController@search');
        Route::post('transactions/refund', 'TransactionsController@refund');
        Route::resource('transactions', 'TransactionsController');

        //Customers Routes
        Route::get('/customersData/{id}', 'CustomersController@showData');
        Route::resource('customers', 'CustomersController');

        //Notification Routes
        Route::resource('notifications', 'NotificationsController');
        Route::post('mark-read-notifications', 'NotificationsController@markAllRead');

        //Language Routes
        Route::get('/language-all', 'LanguageController@all');
        Route::get('/language/chooser_language/{id}', 'LanguageController@chooser_language');
        Route::resource('/language', 'LanguageController');

        //Merchant Account Routes
        Route::resource('merchant-accounts', 'MerchantAccountsController');

        //Audit Log Routes
        Route::get('audit-logs', 'AuditLogsController@index');
        Route::get('audit-logs/{id}', 'AuditLogsController@show');

        //Search Entity Routes
        Route::get('search/users', 'SearchController@users');
        Route::get('search/merchants', 'SearchController@merchants');

        //Processors Routes
        Route::resource('processors', 'ProcessorsController');

        //Merchant Processors Routes
        Route::get(
            'merchant-accounts/{merchantAccount}/processors',
            'MerchantProcessorsController@index'
        );
        Route::get(
            'merchant-accounts/{merchantAccount}/processors/create',
            'MerchantProcessorsController@create'
        );
        Route::post(
            'merchant-accounts/{merchantAccount}/processors',
            'MerchantProcessorsController@store'
        );
        Route::get(
            'merchant-accounts/{merchantAccount}/processors/{processor}/edit',
            'MerchantProcessorsController@edit'
        );
        Route::patch(
            'merchant-accounts/{merchantAccount}/processors/{processor}',
            'MerchantProcessorsController@update'
        );
        Route::delete(
            'merchant-accounts/{merchantAccount}/processors/{processor}',
            'MerchantProcessorsController@destroy'
        );

        //User Fees Routes
        Route::get(
            'merchant-accounts/{merchantAccount}/fees',
            'FeesController@edit'
        );
        Route::get(
            'merchant-accounts/{merchantAccount}/processors/{processor}/fees/edit',
            'FeesController@edit'
        );
        Route::patch(
            'merchant-accounts/{merchantAccount}/processors/{processor}/fees',
            'FeesController@update'
        );
        Route::get(
            'merchant-accounts/{merchantAccount}/processors/{processor}/fees',
            'FeesController@update'
        );
    }
);
