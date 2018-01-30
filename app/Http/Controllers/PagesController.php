<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function getIndex() {
		return 'This PagesController@index';
	}

	public function getShow() {
		return "This PagesController@show";
	}

	public function getAbout() {
		$first = 'Alice';
		$last = 'Abernathy';
		$skills = ['HTML5', 'jQuery', 'Bootstrap', 'Laravel5'];
		return view('pages.about')->withFirst($first)
								  ->withLast($last)
								  ->withSkills($skills);
	}

	public function getContact() {
		return view('pages.contact');
	}
}
