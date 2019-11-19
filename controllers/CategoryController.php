<?php


namespace app\controllers;


use app\models\Category;
use app\models\Post;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends AppController
{
    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        $category = Category::findOne($id);

        if (empty($category)) {
            throw new HttpException(404, 'Такой страницы нет..');
        }

        $query = Post::find()
            ->select('id, title, excerpt')
            ->where(['category_id' => $id])
            ->orderBy('id DESC');

        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 2,
            'pageSizeParam' => false,
            'forcePageParam' => false
        ]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMeta($category->name, $category->keywords, $category->description);

        return $this->render('view', compact('posts', 'pages'));
    }
}