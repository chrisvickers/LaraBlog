<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Options;
use Illuminate\Http\Request;

class MainController extends Controller {

	public function __construct(Options $options)
	{
		$this->options = $options;
		$this->theme = $this->options->where('handle','=','THEME')->first()->value . '/';
	}

	public function home()
	{
		return view(
			$this->theme . 'front_page',
			array()
		);
	}

}
