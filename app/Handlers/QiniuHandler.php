<?php
/**
 * Created by PhpStorm.
 * User: Maker <maker68@163.com>
 * GITHUB: HerbCollins <http://github.com/herbcollins>
 * Date: 2018/6/23 0023
 * Time: 22:06
 */

namespace App\Handlers;


use App\Codes\CommonErrorCode;
use zgldh\QiniuStorage\QiniuStorage;

class QiniuHandler
{
    const STATIC_DISK_NAME = 'static';

    public $static_disk;

    public function __construct()
    {
        $this->static_disk = QiniuStorage::disk(self::STATIC_DISK_NAME);
    }

    public function uploadImg($file)
    {
        if($file){
            $filename = md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
            $date = date('Y_m_d');
            $bool = $this->static_disk->put($date . '/image_'.$filename , file_get_contents($file->getRealPath()));

            if ($bool) {
                $path = $this->static_disk->downloadUrl($date . '/image_' . $filename);
                return $path;
            }else{
                throw new \Exception('图片上传失败' , CommonErrorCode::IMAGE_UPLOAD_FAILD);
            }
        }else{
            throw new \Exception('未找到图片'  , CommonErrorCode::NOT_FOUND_IMAGE);
        }
    }

    public function uploadBase64Img($file)
    {
        if($file){

            if(preg_match('/^(data:\s*image\/(\w+);base64,)/', $file, $result)){
                $type = $result[2];
                if(in_array($type,array('pjpeg','jpeg','jpg','gif','bmp','png'))) {

                    $filename = md5(time().rand()).'.' . $type;
                    $date = date('Y_m_d');

                    $bool = $this->static_disk->put($date . '/image_'.$filename ,base64_decode(str_replace($result[1], '', $file)));//上传

                    if ($bool) {
                        $path = $this->static_disk->downloadUrl($date . '/image_' . $filename);
                        return $path;
                    }else{
                        throw new \Exception('图片上传失败' , CommonErrorCode::IMAGE_UPLOAD_FAILD);
                    }
                }else{
                    throw new \Exception('图片类型不支持' , CommonErrorCode::ILL_IMAGE_TYPE);
                }

            }else{
                throw new \Exception('非base64位图片' , CommonErrorCode::NOT_BASE64_IMAGE);
            }


        }else{
            throw new \Exception('未找到图片'  , CommonErrorCode::NOT_FOUND_IMAGE);
        }
    }
}