<?php
/**
 * Created by PhpStorm.
 * User: Maker <maker68@163.com>
 * GITHUB: HerbCollins <http://github.com/herbcollins>
 * Date: 2018/6/23 0023
 * Time: 2:08
 */

namespace App\Repositories;


use App\Codes\BlogErrorCode;
use App\Handlers\QiniuHandler;
use App\Models\Article;
use Carbon\Carbon;

class ArticleRepository
{
    public function store($attrs)
    {
        return true;
    }

    public function dealHtmlImg($content)
    {
        preg_match_all('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i',$content,$match);

        if(isset($match[2])){
            $base64s = $match[2];
            foreach ($base64s as $base64) {
                // Todo upload
                $handler = new QiniuHandler();
                $newStr =  $handler->uploadBase64Img($base64);

                // Todo replace
                $content = str_replace($base64, $newStr, $content);
            }
        }
        $content = htmlspecialchars($content);
        return $content;
    }

    public function update($attrs)
    {
        if(array_key_exists('title' , $attrs) && $attrs['title'] != null){
            if(array_key_exists('content' , $attrs) && $attrs['content'] != null){

                if(isset($attrs['id']) && $attrs['id'] > 0)
                    $article = Article::find($attrs['id']);
                else
                    $article = new Article();

                // Todo 检测文章ID的正确性
                    ## code..

                $article->title = $attrs['title'];
                $article->content = self::dealHtmlImg($attrs['content']);
                $article->category_id = $attrs['category_id'];
                $article->type = "o";
                $article->last_edit_at = Carbon::now()->toDateTimeString();
                $article->save();
                return true;
            }else{
                throw new \Exception('内容不能为空' , BlogErrorCode::CONTENT_NOT_ALLOWED_EMPTY);
            }
        }else{
            throw new \Exception('标题不能为空' , BlogErrorCode::TITLE_NOT_ALLOWED_EMPTY);
        }
    }

    public function delete($id)
    {
        return true;
    }

    public function publish($attrs)
    {
        if(array_key_exists('title' , $attrs) && $attrs['title'] != null){
            if(array_key_exists('content' , $attrs) && $attrs['content'] != null){
                if(isset($attrs['id']) && $attrs['id'] > 0)
                    $article = Article::find($attrs['id']);
                else
                    $article = new Article();

                // Todo 检测文章ID的正确性
                ## code..

                $article->title = $attrs['title'];
                $article->content = self::dealHtmlImg($attrs['content']);
                $article->category_id = $attrs['category_id'];
                $article->type = $attrs['type'];
                $article->last_edit_at = Carbon::now()->toDateTimeString();
                $article->published_at = Carbon::now()->toDateTimeString();
                $article->save();

                return true;
            }else{
                throw new \Exception('内容不能为空' , BlogErrorCode::CONTENT_NOT_ALLOWED_EMPTY);
            }
        }else{
            throw new \Exception('标题不能为空' , BlogErrorCode::TITLE_NOT_ALLOWED_EMPTY);
        }
    }
}