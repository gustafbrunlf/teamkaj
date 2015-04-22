<?php namespace App\Providers;
use App\Category;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('pages._header', function($view)
		{
		    $view->with('categoriesmenu', Category::all());
		});

		view()->composer('pages._productform', function($view)
		{
			$users = User::all();

			foreach ($users as $user) {
				$usernames[$user->id] = $user->name;
			}

		    $view->with('usernames', $usernames);
		});

		view()->composer('pages.superadmin', function($view)
		{
			$resetsTable = DB::table('password_resets')->select('email')->get();
			
			foreach ($resetsTable as $reset)
			{
				$resets[] = $reset->email;
			}

			$view->with('resets', $resets);
		});
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
