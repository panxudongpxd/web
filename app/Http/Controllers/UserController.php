<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
class UserController extends Controller
{
    public function index()
    {
    	//dd(11111);
    	return view('index');
    }
    public function upload(Request $request)
    {
    	if($request->hasFile('file')){
    		//创建文件对象
    		$file=$request->file('file');
    		//获取文件拓展名
    		$exten=$file->extension();
    		//存储路径
    		//给文件起名
    		$name=str_random(20).'.'.$exten;
    		$dir_path='./uploads/'.date('Ymd',time());
    		//移动图片到真实路径
    		$res=$file->move($dir_path,$name);
    		if($res){
			    $arr=[
			    	 "code"=> 1
			  		,"msg"=> "上传成功"
			  		,"src"=> $dir_path.$name
			    ];
			    echo json_encode($arr);
    		}else{
    			$arr=[
			    	 "code"=> 0
			  		,"msg"=> "上传失败"
			  		,"src"=> $dir_path.$name
			    ];
			    echo json_encode($arr);
    		}
    	}
    }
}
