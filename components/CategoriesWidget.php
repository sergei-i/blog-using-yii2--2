<?php


namespace app\components;


use app\models\Category;
use yii\base\Widget;
use Yii;

class CategoriesWidget extends Widget
{
    public function run()
    {
        $html = Yii::$app->cache->get('categoriesMenu');

        if (!$html) {
            $categories = Category::find()->select('id, name')->asArray()->orderBy('name')->all();

            $html = $this->render('categories', ['categories' => $categories]);

            Yii::$app->cache->set('categoriesMenu', $html, 60 * 60);
        }

        return $html;
    }
}