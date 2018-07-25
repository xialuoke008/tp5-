<?php

namespace app\Index\controller;

use think\Controller;
use think\Request;
use app\common\model\A;
class Test4Controller extends Controller
{
            //上传文件 并生成缩略图
        public function fn7()
        {
            #判断是否post请求：是-处理上传文件，否-则加载表单视图
            if (Request::instance()->isPost())  {
                //获取表单上传文件
                $file = request()->file('image'); //相当于$_FILES['image']
                
                //判断是否有上传文件信息：有-正常，没有-可能非法操作
                if ($file) {
                    //移动文件，到根目录\public\uploads目录中
                    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                    //判断是否上传成功
                    if($info) {
                        // 成功上传后 获取上传信息
                        // 输出 jpg
                        echo $info->getExtension() . '<br />';
                        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                        echo $info->getSaveName() . '<br />';
                        // 输出 42a79759f284b767dfcb2a0197904287.jpg
                        echo $info->getFilename() . '<br />'; 

                        #上传基础上生成缩略图
                        $image = \think\Image::open($file);
                        // 按照原图的比例生成一个最大为350*350的缩略图并保存为thumb.png
                        $thumbImgName = ROOT_PATH . 'public' . DS . 'uploads' . DS . 
                                        str_replace('.'.$info->getExtension(), '', $info->getSaveName())
                                        . '350x350' . '.' .$info->getExtension();
                        echo $thumbImgName;
                        #$image->thumb(350, 350)->save($thumbImgName);

                         // * @param  string  $text   添加的文字
                         // * @param  string  $font   字体路径
                         // * @param  integer $size   字号
                         // * @param  string  $color  文字颜色
                         // * @param int      $locate 文字写入位置
                         // * @param  integer $offset 文字相对当前位置的偏移量
                         // * @param  integer $angle  文字倾斜角度
                        $image->text('itcast','3.ttf', 30,'#ffffff', \think\Image::WATER_SOUTH)->thumb(350, 350)->save($thumbImgName);
                    }else{
                        // 上传失败获取错误信息
                        echo $file->getError();
                    }
                }  else {
                    echo '未知瑕疵';
                }
            } else {
                return $this->fetch('fn7');
            }
        }


       // //上传文件 并生成缩略图
       //  public function fn7()
       //  {
       //      #判断是否post请求：是-处理上传文件，否-则加载表单视图
       //      if (Request::instance()->isPost())  {
       //          //获取表单上传文件
       //          $file = request()->file('image'); //相当于$_FILES['image']
                
       //          //判断是否有上传文件信息：有-正常，没有-可能非法操作
       //          if ($file) {
       //              //移动文件，到根目录\public\uploads目录中
       //              $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
       //              var_dump($info) . '<hr />';
       //              //判断是否上传成功
       //              if($info) {
       //                  // 成功上传后 获取上传信息
       //                  // 输出 jpg
       //                  echo $info->getExtension() . '<br />';
       //                  // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
       //                  echo $info->getSaveName() . '<br />';
       //                  // 输出 42a79759f284b767dfcb2a0197904287.jpg
       //                  echo $info->getFilename() . '<br />'; 

       //                  #上传基础上生成缩略图
       //                  $image = \think\Image::open($file);
       //                  // 按照原图的比例生成一个最大为350*350的缩略图并保存为thumb.png
       //                  $thumbImgName = ROOT_PATH . 'public' . DS . 'uploads' . DS . 
       //                                  str_replace('.'.$info->getExtension(), '', $info->getSaveName())
       //                                  . '350x350' . '.' .$info->getExtension();
       //                  echo $thumbImgName;
       //                  $image->thumb(350, 350)->save($thumbImgName);
       //              }else{
       //                  // 上传失败获取错误信息
       //                  echo $file->getError();
       //              }
       //          }  else {
       //              echo '未知瑕疵';
       //          }
       //      } else {
       //          return $this->fetch('fn7');
       //      }
       //  }

        //多图片上传
        public function fn6()
        {
            #判断是否post请求：是-处理上传文件，否-则加载表单视图
        if (Request::instance()->isPost())  {
            //步骤1：获取上传文件信息
            //注：单文件$file是对象
            //注：多文件$file是数组，数组中是对象
            $files = request()->file('image'); //相当于$_FILES['image']
            //步骤2：遍历上传
            foreach ($files as $file) {
                //判断文件是否为空
                if ($file) {
                    //调用move方法上传
                    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                    //判断上传结果
                    if ($info) {
                        //输出上传文件名
                        echo $info->getSaveName() . '<br />';
                    }
                }
            }
        } else {
            return $this->fetch('fn6');
        }

    } 

            //上传文件
        public function fn5()
        {
            #判断是否post请求：是-处理上传文件，否-则加载表单视图
            if (Request::instance()->isPost())  {

                // 获取表单上传文件 例如上传了001.jpg
                $file = request()->file('image'); //相当于$_FILES['image']
                
                //判断是否有上传文件信息：有-正常，没有-可能非法操作
                if ($file) {
                    //移动文件，到根目录\public\uploads目录中
                    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                    // var_dump($info);die;
                    //判断是否上传成功
                    if($info) {
                        // 成功上传后 获取上传信息
                        // 输出 jpg
                        echo $info->getExtension() . '<br />';
                        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                        echo $info->getSaveName() . '<br />';
                        // 输出 42a79759f284b767dfcb2a0197904287.jpg
                        echo $info->getFilename() . '<br />'; 
                    }else{
                        // 上传失败获取错误信息
                        echo $file->getError();
                    }
                }  else {
                    echo '未知瑕疵';
                }
                
            } else {
                return $this->fetch('fn5');
            }
        }

    //模型联表查询
    public function fn4()
    {   
        //默认内连
        $rs = A::join('b', 'a.id = b.a_id')->select();
        dump($rs);
        //默认左外连
        $rs = A::join('b', 'a.id = b.a_id', 'left')->select();
        dump($rs);
        //默认右外连
        $rs = A::join('b', 'a.id = b.a_id', 'right')->select();
        dump($rs);
    }

    
}
