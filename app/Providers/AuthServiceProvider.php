<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Admin;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		// 'App\Models\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerPolicies();

		Gate::define('master-admin', function (Admin $user) {
			return $user->role == 'master';
		});
		Gate::define('sie-perkap', function (Admin $user) {
			return $user->role == 'sie-perkap';
		});
		Gate::define('sie-lomba', function (Admin $user) {
			return $user->role == 'sie-lomba';
		});
	}
}
