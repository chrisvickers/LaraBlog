<?php

namespace App\Http\Controllers;


use App\Options;
use Illuminate\Support\Facades\View;

class BaseController extends Controller {

    public function __construct(Options $options)
    {
        dd();
        view()->share();
        View::share('blog_title', $this->blog_title = $options->where('handle','=','BLOG_TITLE')->first()->value);

    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }
}
