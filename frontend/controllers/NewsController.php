<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\News;
use app\models\Rubric;

class NewsController extends Controller
{

    public function actionIndex(){
        $rubrics = Rubric::find()
        ->where(["parent_rubric_id" => 0])
        ->with("children")
        ->all();

        return $this->render('index', compact('rubrics'));
    }

    public function actionRubric($id=0){
        $news = News::find()
        ->leftJoin('news_to_rubric', 'news.id = news_to_rubric.news_id')
        ->leftJoin('rubric', 'news_to_rubric.rubric_id = rubric.id')
        ->where(["rubric_id"=>$id])
        ->all();

        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $news;
        }else{
            return $this->render('rubric', compact('news'));
        }
    }

    public function actionInfo($id=0){
        $news = News::findOne($id);

        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $news;
        }else{
            return $this->render('rubric', compact('news'));
        }
    }

}