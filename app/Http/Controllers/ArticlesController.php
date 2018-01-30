<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use Request;
use App\Http\Requests\ArticleRequest;
use App\Tag;
// use Illuminate\Http\Request;

class ArticlesController extends Controller {

	public function index() {
		$articles = Article::latest('published_at')->published()->get();
		return view('articles.index', compact('articles'));
	}

	public function show($id) {
		$articles = Article::find($id);
		if(empty($article))
			abort(404);
		return view('articles.show', compact('article'));
	}

	public function create(){
		$tag_list = Tag::lists('name', 'id');
		return view('articles.create', compact('tag_list'));
	}

	public function store(ArticleRequest $request){
		$article = new Article($request->all());
		if($request->hasFile('image')){
			$image_filename = $request->file('image')
			->getClientOriginalName();
			$image_name = date('Ymd-His-').$image_filename;
			$public_path = 'images/articles/';
			$destination = base_path() . "/public/" . $public_path;
			$request->file('image')->move($destination, $image_name);
			$article->image = $public_path . $image_name;
		}
		Auth::user()->articles()->save($article);
		$tagsId = $request->input('tag_list');
		if(!empty($tagsId))
			$article->tags()->sync($tagsId);
		return redirect('articles');

	}

	public function edit($id){
		$article = Article::find($id);
		$tag_list = Tag::lists('name', 'id');
		if(empty($article))
			abort(404);
		return view('articles.edit', compact('article', 'tag_list'));
	}

	public function update($id, ArticleRequest $request){
		$article = Article::findOrFail($id);
		$article->update($request->all());
		if($request->hasFile('image')){
			$image_filename = $request->file('image')
			->getClientOriginalName();
			$image_name = date('Ymd-His-').$image_filename;
			$public_path = 'images/articles/';
			$destination = base_path() . "/public/" . $public_path;
			$request->file('image')->move($destination, $image_name);
			$article->image = $public_path . $image_name;
			$article->save();
		}
		$tagsId = $request->input('tag_list');
		if(!empty($tagsId))
			$article->tags()->sync($tagsId);
		return redirect('articles');
	}

	public function destroy($id) {
		$article = Article::findOrFail($id);
		$article->delete();
		return redirect('articles');
	}

	public function __construct(){
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}
}
