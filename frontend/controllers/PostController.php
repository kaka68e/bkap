<?php

namespace frontend\controllers;


use backend\models\Post;
use backend\models\CategoryPost;

class PostController extends \yii\web\Controller
{
	public function beforeAction($action)
	{
	    $this->layout = 'main-post';
	    return parent::beforeAction($action);
	}
    public function actionIndex()
    {
        // $data = Post::find()->where(['status'=>1])->orderBy(['(post_id)' => SORT_DESC])->asArray()->limit(3)->all();
    	$data = Post::find()->where(['status'=>1])->asArray()->limit(3)->all();
        return $this->render('index',[
        	'data' => $data
        ]);
    }

    // Chi tiết bài viết
    public function actionDetail($slug)
    {
        // lấy ra chi tiết sản phẩm đấy
        $postDetail = Post::find()->where(['post_slug'=>$slug,'status'=>1])->asArray()->all();
        // Lấy ra dc danh mục của sản phẩm đấy thuộc loại nào
        $category_post = Categorypost::findOne(['categorypost_id'=>$postDetail[0]['id_categorypost']]);

        return $this->render('detail',[
            'postDetail' => $postDetail,
            'category_post_name' => $category_post->categorypost_name,
        ]);
    }

}
