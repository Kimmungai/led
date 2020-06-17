<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use App\Org;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class PostsCotroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::orderBy('created_at','DESC')->paginate(env('ITEMS_PER_PAGE',4));
      return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $orgs = Org::all();
      return view('post.create',compact('orgs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
      $post_category = $request->post_category ? $request->post_category : [];
      $post_category_mobile = $request->post_category_mobile ? $request->post_category_mobile : [];
      $post_category = is_array($post_category) ? $post_category : [$post_category];
      $post_category_mobile = is_array($post_category_mobile) ? $post_category_mobile : [$post_category_mobile];
      $categories = array_merge($post_category,$post_category_mobile);
      $post_tag = $request->post_tag ? $request->post_tag : [];
      $post_tag_mobile = $request->post_tag_mobile ? $request->post_tag_mobile : [];
      $post_tag = is_array($post_tag) ? $post_tag : [$post_tag];
      $post_tag_mobile = is_array($post_tag_mobile) ? $post_tag_mobile : [$post_tag_mobile];
      $tags = array_merge($post_tag,$post_tag_mobile);


      $postData = $request->only(['title','content','excerpt','featured_img']);
      $postData['excerpt'] = $request->excerpt ? $request->excerpt : $request->excerpt_mobile;
      $postData['featured_img'] = $request->featured_img ? $request->featured_img : $request->featured_img_mobile;
      $postData['publisher'] = Auth::id();
      $postData['published'] = $request->published ? $request->post_tag : 1 ;
      $postData['excerpt'] = $postData['excerpt'] ? $postData['excerpt'] : Str::words($postData['content'], 3);
      $postData['slug'] = Str::slug($request->title);
      if( $request->hasFile('featured_img') )
      {
        $postData['featured_img'] = $this->uploadFeaturedImage($request);
        $postData['featured_img_uri'] = url('storage/'.$postData['featured_img']);
      }
      else
      {
        $postData['featured_img'] = 'images/bg/blog-bg-placeholder.jpg';
        $postData['featured_img_uri'] = url($postData['featured_img']);
      }


     $post = Post::create($postData);
     if( count($categories) )
        $this->createCategories($post,$categories);
     if( count($tags) )
        $this->createTags($post,$tags);
     Session::flash('message', "Post saved succesfully!");
    return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      $orgs = Org::all();
      return view('post.edit',compact('orgs','post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $post_category = $request->post_category ? $request->post_category : [];
      $post_category_mobile = $request->post_category_mobile ? $request->post_category_mobile : [];
      $categories = array_merge($post_category,$post_category_mobile);
      $post_tag = $request->post_tag ? $request->post_tag : [];
      $post_tag_mobile = $request->post_tag_mobile ? $request->post_tag_mobile : [];
      $tags = array_merge($post_tag,$post_tag_mobile);

      $postData = $request->only(['title','content','excerpt','featured_img']);
      $postData['excerpt'] = $request->excerpt ? $request->excerpt : $request->excerpt_mobile;
      $postData['featured_img'] = $request->featured_img ? $request->featured_img : $request->featured_img_mobile;
      $postData['published'] = $request->published ? $request->post_tag : 1 ;

      if( $request->hasFile('featured_img') )
      {
        $postData['featured_img'] = $this->uploadFeaturedImage($request);
        $postData['featured_img_uri'] = url('storage/'.$postData['featured_img']);
      }
      else
        unset($postData['featured_img']);

     $post->update($postData);

     $post->update($postData);
     if( count($categories) )
        $this->createCategories($post,$categories);
     if( count($tags) )
        $this->createTags($post,$tags);
     Session::flash('message', "Post updated succesfully!");

     return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->categories()->delete();
        $post->tags()->delete();
        $post->comments()->delete();
        $post->likes()->delete();
        $post->delete();
        Session::flash('message', "Post deleted succesfully!");
        return redirect(route('post.index'));
    }

    private function uploadFeaturedImage($request)
    {
      if( !$request->hasFile('featured_img') )
        return false;
      return Storage::disk('public')->putFileAs('FeaturedImages', new File($request->file('featured_img')), Carbon::now()->timestamp.'.jpg');
    }
    private function createCategories($post,$categories)
    {
      foreach ($categories as $category) {
        if( $post->categories()->where('title',$category)->first() )
          continue;
        $cat = new Category;
        $cat->post_id = $post->id;
        $cat->title = $category;
        $cat->save();
      }

    }
    private function createTags($post,$tags)
    {
      foreach ($tags as $tag) {
        if( $post->tags()->where('title',$tag)->first() )
          continue;
        $tagItem = new Tag;
        $tagItem->title = $tag;
        $tagItem->post_id = $post->id;
        $tagItem->save();
      }

    }
}
