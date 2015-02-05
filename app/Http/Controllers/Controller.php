<?php namespace App\Http\Controllers;

use App\Options;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\View;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;


}
