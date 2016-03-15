<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use App\Posts;
use App\PostMetaData;

class AdminController extends Controller{
	public function index(){
		return view('admin.adminindex');
	}
	public function showPosts($page_number=null){
		if(empty($page_number)) $page_number = 1;
		// Create pagination 
		// Create offset and limit variables
			$postsPerPage = 3;
			$offset = 0;

			if(!empty($page_number) && $page_number != 1):
				$offset = ( $postsPerPage * ($page_number -1) );
			endif;
		
		$postMetaData = PostMetaData::where('author_id', \Auth::user()->id );
		$totalPosts = count($postMetaData->get());
		// Paginate
			$postMetaData = $postMetaData->take($postsPerPage)->offset($offset)->get();														
		$totalPages = ceil($totalPosts / $postsPerPage);
		return view('admin.adminposts')->with('postMetaData', $postMetaData)
									   ->with('totalPosts', $totalPosts)
									   ->with('postsPerPage', $postsPerPage)
									   ->with('page_number', $page_number)
									   ->with('totalPages', $totalPages);
	}
	public function setPostStatus(){
		error_log('function setPostStatus called()');
		error_log(print_r(Input::all(), true));
		
		$postMetaData = PostMetaData::where('post_id', Input::get('post_id'))->first();
		$postMetaData->active = Input::get('new_status'); 
		$postMetaData->save();
		
	}
	public function editPost($postId){
		
		$postMetaData = PostMetaData::where('post_id', $postId)->first();
 		$post = Posts::where('id', $postId)->first();

		return view('admin.editor')->with('post', $post)
								   ->with('postMetaData', $postMetaData);
	}
	// ~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=
	public function previewPost($post_id){
		error_log("function previewPost called");
		$post = Posts::where('id', $post_id)->first();	
		$postMetaData = PostMetaData::where('post_id', $post_id)->first();
		return view('admin.previewPost')->with('post', $post)
										->with('postMetaData', $postMetaData);
	} 
	// ~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=
	public function showEditor(){
		return view('admin.editor');
	}
	public function savePost(){
		if((Input::get('post_id') )):
			error_log("it is set");
			$post = Posts::where('id', Input::get('post_id'))->first();			
			$postMetaData = PostMetaData::where('post_id', Input::get('post_id'))->first();
		else:
			$post = new Posts;
			$postMetaData = new PostMetaData;
		endif;	
		// Save the post
			$post->post_content = Input::get('editor1');
			$post->save();
		// Now, save post meta data
			$postActive = Input::get('post_active') == 'on' ? 1 : 0;
			$postMetaData->publish_date_time = Input::get('publish_date') . ' ' . Input::get('publish_time'); 
			$postMetaData->author_id = \Auth::user()->id;
			$postMetaData->post_id = $post->id;
			$postMetaData->title = Input::get('post_title');
			$postMetaData->active = $postActive;
			$postMetaData->updated_at = Carbon::now();
			$postMetaData->save();
		return \Redirect::action('AdminController@index');
	}
	// ~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=
	public function showAssets(){
		return view('admin.assets');
	}
	public function showSysInfo(){
		return view('admin.sysInfo');
	}
}
