<?php namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller {

	public function __construct()
    {
        $this->middleware('auth',['only'=>'create']);
    }

	public function index()
	{
		// $articles = Article::all();
		// $articles = Article::latest('created_at')->get();

		//published = scopePublished is on Article Model
		$articles = Article::latest('created_at')->published()->get();

		return view('articles.index', compact('articles'));
	}

	public function show(Article $article)
	{
        //dd($id);
		//$article = Article::findOrFail($id);
		return view('articles.show', compact('article') );
	}

	public function create()
	{

        // if(Auth::guest())
        // {
        //     return redirect('articles');
        // }

        $tags = Tag::lists('name','id');

		return view('articles.create', compact('tags'));
	}

    public function store(ArticleRequest $request)
    {
        // $input = Request::all();
        // $input['created_at'] = Carbon::now();

        //$this->validate($request, ['title' => 'required','body'=> 'required' ]);

        //$article = new Article($request->all());
        $article = Auth::user()->articles()->create($request->all());

        //dd($tagIds);

        $article->tags()->attach($request->input('tag_list'));

        // Auth::user()->articles()->save($article);
        
        \Session::flash('flash_message','your article has been created! ');

        return redirect('articles');

        // Auth::user();

        // Article::create($request->all());

        // return redirect('articles');
    }

    public function edit(Article $article)
    {
        //$article = Article::findOrFail($id);
        $tags = Tag::lists('name','id');

        return view('articles.edit', compact('article','tags'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        //$article = Article::findOrFail($id);

        $article->update($request->all());

        $article->tags()->sync($request->input('tag_list'));

        return redirect('articles');
    }

//	public function store(Request $request)
//	{
//		// $input = Request::all();
//		// $input['created_at'] = Carbon::now();
//
//        $this->validate($request, ['title' => 'required','body'=> 'required' ]);
//
//        Article::create($request ->all());
//
//		return redirect('articles');
//	}

}
