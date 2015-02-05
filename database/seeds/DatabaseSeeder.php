<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Options;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('OptionSeeder');
	}

}

class OptionSeeder extends Seeder {


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('Option Table seeded');

		Options::create(array(
			'type'      =>  'theme',
			'handle'    =>  'THEME',
			'value'     =>  'simple_blog'
		));
		Options::create(array(
			'type'		=>	'blog title',
			'handle'	=>	'BLOG_TITLE',
			'value'		=>	'LaraBlog'
		));


	}


}
