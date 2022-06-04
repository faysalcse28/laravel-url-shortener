<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class UrlController extends Controller
{
    public function index()
    {
		return view('short-url');
    }
	
	public function getUrls()
    {
        $urls = \AshAllenDesign\ShortURL\Models\ShortURL::latest()->get();
		if(count($urls)==0){
			$data = ['status'=>400, 'message'=>'No data found.'];
		}else{
			$data = ['status'=>200, 'data'=>$urls];
		}
		
		return Response::json($data);
    }
	
	
    public function doShorten(Request $request)
    {
        $url = request()->url;
		if (filter_var(request()->url, FILTER_VALIDATE_URL) === false) {
			$data = ['status'=>400, 'message'=>'Input URL is invalid.'];
			return Response::json($data);
			exit;
		}
		
		$model = new \AshAllenDesign\ShortURL\Models\ShortURL();
		$destination_url = $model->findByDestinationURL($url);
		if (count($destination_url) > 0) {
			$data = ['status'=>400, 'message'=>'Input URL previously created.'];
			return Response::json($data);
			exit;
		}
		
		$builder = new \AshAllenDesign\ShortURL\Classes\Builder();
		$shortURLObject = $builder->destinationUrl(request()->url)->make();
		$shortURL = $shortURLObject->default_short_url;

		$data = ['status'=>200, 'message'=>'Shortened URL successfully.'];
		return Response::json($data);
    }
}
