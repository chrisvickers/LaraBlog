<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Options extends Model {

	//

    protected $table = 'lb_options';


    protected $hidden = [];

    protected $fillable = [
        'type',
        'handle',
        'value'
    ];

}
