<?php


namespace app\controllers;


use app\models\Post;
use yii\data\Pagination;
use yii\web\HttpException;

class PostController extends AppController
{
    public function actionIndex()
    {
        $query = Post::find()->select('id, title, excerpt')->orderBy('id DESC');
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 2,
            'pageSizeParam' => false,
            'forcePageParam' => false
        ]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('posts', 'pages'));
    }

    public function actionView()
    {
        $id = \Yii::$app->request->get('id');
        $post = Post::findOne($id);

        if (empty($post)) {
            throw new HttpException(404, 'Такой страницы нет');
        }

        return $this->render('view', compact('post'));
    }
}