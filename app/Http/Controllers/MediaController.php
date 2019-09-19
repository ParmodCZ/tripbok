<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Media;
class MediaController extends Controller{
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }  

    /**
     * Add media .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(Request $request){

        /**
         * PHP Image uploader Script
         */
        $uploaddir = 'storage/app/public/media/';
        //print_r($uploaddir); die;
        $images = $this->restructureArray($_FILES);
        //echo '<pre>';print_r($images);echo '</pre>';exit;

        $data = [];

        foreach ($images as $key => $image) {
            $name = $image['name'];
            $uploadfile = $uploaddir . basename($name);
            if (move_uploaded_file($image['tmp_name'], $uploadfile)) {
                $data[$key]['success'] = true;
                $data[$key]['src'] = $uploaddir.$name;

            } else {
                $data[$key]['success'] = false;
                $data[$key]['src'] = $name;
            }
        }   

        echo json_encode($data);
        exit;
    }

    /**
     * RestructureArray method
     * 
     * @param array $images array of images
     * 
     * @return array $result array of images
     */
    function restructureArray(array $images)
    {
        $result = array();
        foreach ($images as $key => $value) {
            foreach ($value as $k => $val) {
                for ($i = 0; $i < count($val); $i++) {
                    $result[$i][$k] = $val[$i];
                }
            }
        }

        return $result;
    }

}
