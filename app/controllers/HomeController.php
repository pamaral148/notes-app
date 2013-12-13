<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	    public function index()
        {
            $title = 'Assignment 2 - Home';
            $user_id = Auth::user()->id;
            $notes = Note::where('user_id', $user_id)
            		->orderBy('updated_at','DESC')
            		->get();
            $links = Link::where('user_id', $user_id)
            		->orderBy('updated_at','DESC')
            		->get();User::find($user_id)->links;
            $tbds = Tbd::where('user_id', $user_id)
            		->orderBy('updated_at','DESC')
            		->get();
            $images = Image::where('user_id',$user_id)->get();
            
            $dir = './tmp/' . $user_id;
                      
            if (is_dir('./tmp/' . $user_id) ){
	            $tmpFiles = scandir($dir);
	            foreach($tmpFiles as $file) {
	            	if(($file == '.') ||
	            	($file == '..')
	            	) {
	            		continue;
	            	}
	            	unlink($dir . '/' . $file);
	            }
	            
            } else 
            {
            	File::makeDirectory($dir,  $mode = 0777, $recursive = false);
            }
            
            foreach ($images as $image){
            	file_put_contents($dir . "/" .$image->id . "." . $image->extension, $image->contents);
            	$this->thumb($dir. "/" . $image->id . "." . $image->extension,$image->extension, $dir);
            }
            
            return View::make('home.index')
                        ->with('title', $title)
                        ->with('notes', $notes)
                        ->with('tbds', $tbds)
                        ->with('links', $links)
            			->with('images', $images);
            		
        }
        
        private function thumb($image,$ext, $dir){
        	
        	if ($ext == "jpg" )
        		$original  = Imagecreatefromjpeg($image);
                elseif ($ext == "jpeg" )
        		$original  = Imagecreatefromjpeg($image);
        	else
        		$original  = Imagecreatefromgif($image);
        	 
        	if(imagesy($original) > imagesx($original))
        	{
        		// tall image
        		$thumbHeight = 125;
        		$thumbWidth  = round(125 * imagesx($original) / imagesy($original));
        	}
        	else
        	{
        		// wide image
        		$thumbHeight = round(125 * imagesy($original) / imagesx($original));;
        		$thumbWidth  = 125;
        	}
        	
        	$thumbnail = ImageCreateTrueColor($thumbWidth, $thumbHeight);

        	Imagecopyresampled(  $thumbnail, $original, 0, 0, 0, 0,
           	$thumbWidth, $thumbHeight,   imagesx($original), imagesy($original));
        	
        	$thumname = str_replace($dir . "/" , $dir . '/thumb', $image);
        	// the name file 
        	if ($ext == "jpg" )
        	imagejpeg($thumbnail, $thumname, 100);
        	else
        	imagegif($thumbnail, $thumname, 100);
        }	
        		
        

}