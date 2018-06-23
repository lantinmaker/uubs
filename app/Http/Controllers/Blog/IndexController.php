<?php

namespace App\Http\Controllers\Blog;

use App\Handlers\QiniuHandler;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        return view('front.blog.index');
    }

    public function create()
    {

        return view('front.blog.create');
    }

    public function store(Request $request)
    {
        try{
            if($this->articleRepository->store($request->all())){
                return response()->json();
            }else{
                return response()->json();
            }
        }catch (\Exception $e){
            return response()->json();
        }
    }

    public function edit($id)
    {
        $type = "o";
        return view('front.blog.edit' , compact('type'));
    }

    public function ajaxsave(Request $request )
    {
        try{
            if($this->articleRepository->update($request->all())){
                return response()->json([
                    'code' => 0,
                    'message' => '保存成功'
                ]);
            }else{
                return response()->json([
                    'code' => 100001,
                    'message' => '保存失败'
                ]);
            }
        }catch (\Exception $e){
            return response()->json([
                'code' => 100001,
                'message' => $e->getMessage()
            ]);
        }

    }

    public function ajaxpublish(Request $request )
    {
        try{
            if($this->articleRepository->publish($request->all())){
                return response()->json([
                    'code' => 0,
                    'message' => '发布成功'
                ]);
            }else{
                return response()->json([
                    'code' => 10001,
                    'message' => '发布失败'
                ]);
            }
        }catch (\Exception $e){
            return response()->json([
                'code' => 100001,
                'message' => $e->getMessage()
            ]);
        }

    }

    public function destory($id)
    {
        try{
            if($this->articleRepository->delete($id)){
                return response()->json();
            }else{
                return response()->json();
            }
        }catch (\Exception $e){
            return response()->json();
        }

    }
}
