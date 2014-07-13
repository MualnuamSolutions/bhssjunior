<?php

class PhotosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function uploader()
    {
        $result = ['status' => '', 'photoPath' => ''];

        if (Input::hasFile('photoFile')) {
            $photo = Input::file('photoFile');
            $hash = md5($photo->getClientOriginalName() . time());
            $extension = $photo->getClientOriginalExtension();
            $fileName = $hash . '.' . $extension;
            $uploadDir = public_path('uploads/temp/');
            $photo->move($uploadDir, $fileName);
            $result = [
                'status' => 'OK',
                'photoPath' => $fileName,
            ];
        }
        else {
            foreach(Input::file('files') as $photo) {

                $hash = md5($photo->getClientOriginalName() . time());
                $extension = $photo->getClientOriginalExtension();
                $fileName = $hash . '.' . $extension;
                $uploadDir = public_path('uploads/temp/');
                $photo->move($uploadDir, $fileName);
                $result = [
                    'status' => 'OK',
                    'photoPath' => $fileName,
                ];
            }
        }

        return Response::json($result);
    }
}
