<?php

class ImageController extends BaseController {

	/**
	 * Store a newly created resource in storage.
	 * POST /image
	 *
	 * @return Response
	 */
	public function upload()
	{

		$avatar             = Input::file('img');
		if($avatar){
			$filename = time()."-profile_pic.".$avatar->getClientOriginalExtension();
      $path = public_path('images/avatar/' . $filename);
			$img = Image::make($avatar->getRealPath());
			$img->save($path);

			chmod($path, 0777);
			
			$response = array(
				"status" => 'success',
				"url" => "/images/avatar/".$filename,
				"width" => $img->width(),
				"height" => $img->height(),
				"realpath" => $path,
				"name" => $filename
		  );

			return json_encode($response);
		}else{
			return "there is an error with the image file";
		}
        

	}

	/**
	 * Display a listing of the resource.
	 * GET /image
	 *
	 * @return Response
	 */
	public function crop()
	{


		$imgUrl = 	Input::get('imgUrl');
		$imgInitW = Input::get('imgInitW');
		$imgInitH = Input::get('imgInitH');
		$imgW = 		Input::get('imgW');
		$imgH = 		Input::get('imgH');
		$imgY1 = 		intval(Input::get('imgY1'));
		$imgX1 = 		intval(Input::get('imgX1'));
		$cropW = 		intval(Input::get('cropW'));
		$cropH = 		intval(Input::get('cropH'));
		$url = 			Input::get('url');

		//return $url.$imgUrl;

		//return $cropW.' '.$cropH.' '.$imgX1.' '.$imgY1;

		$filename = time()."-profile_pic.jpg";
    $path = public_path('images/avatar/' . $filename);

		$img = Image::make($url.$imgUrl);
		$img->resize($imgW, $imgH)->crop($cropW, $cropH, $imgX1, $imgY1)->save($path,100);
		$img->destroy();
		// crop image

		$response = array(
			"status" => 'success',
			"url" => "/images/avatar/".$filename, 
		  );
	 
	 return json_encode($response);

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /image/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /image
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /image/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /image/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /image/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /image/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}