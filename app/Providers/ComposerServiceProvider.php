<?php namespace App\Providers;

use App\Options;
use View;
use Route;
use Auth;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * @param Options $options
     */
	public function boot(Options $options)
	{
		//All Shares go in here
        $title = $options->where('handle','=','BLOG_TITLE')->first();
        if(isset($title))
        {
            view()->share('blog_title',$options->where('handle','=','BLOG_TITLE')->first()->value);
        }

        $description = $options->where('handle','=','BLOG_DESCRIPTION')->first();
        if(isset($description))
        {
            view()->share('blog_description', $options->where('handle','=','BLOG_DESCRIPTION')->first()->value);
        }
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
