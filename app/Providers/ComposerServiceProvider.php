<?php namespace App\Providers;

use App\Options;
use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot(Options $options)
	{
		//All Shares go in here
		view()->share('blog_title',$options->where('handle','=','BLOG_TITLE')->first()->value);
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
