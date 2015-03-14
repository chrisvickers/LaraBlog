<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Options;
use App\Page;
use Illuminate\Http\Request;

class MainController extends Controller {

	public function __construct(Options $options, Page $pages)
	{
		$this->options = $options;
        $this->page = $pages;
		$this->theme = $this->options->where('handle','=','THEME')->first()->value . '/';
	}

	public function home()
	{
		return view(
			$this->theme . 'front_page',
			array()
		);
	}



    public function page($page)
    {
        $page = $this->page->where('slug','=',$page)->first();

        if(isset($page))
        {
            return view(
                $this->theme . 'page',
                array(
                    'page_html'  =>  $page->html,
                    'page_title' =>  $page->title,
                    'page_slug'  =>  $page->slug,
                    'page_date'  =>  $page->live_date
                )
            );
        }

        abort(404);
    }

}
