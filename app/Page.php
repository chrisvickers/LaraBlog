<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    /**
     * Table Name
     * @var string
     */
    protected $table = 'pages';


    /**
     * Fillable Attributes
     * @var array
     */
    protected $fillable = array(
        'html',
        'live_date'
    );


    /**
     * Hidden Attributes
     * @var array
     */
    protected $hidden = array();

}
