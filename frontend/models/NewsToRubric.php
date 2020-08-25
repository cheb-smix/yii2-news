<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * NewsToRubric model
 *
 * @property integer $rubric_id
 * @property integer $news_id
 */

class NewsToRubric extends ActiveRecord
{
	public function attributeLabels()
	{
		return [
			'rubric_id'=>'ID рубрики',
			'news_id'=>'ID новости'
		];
	}

	public function rules()
	{
		return [
			[ ['rubric_id','news_id'], 'required' ]
		];
	}

	public function getRubric()
	{
		return $this->hasOne(Rubric::className(), ['id' => 'rubric_id']);
	}
	
    public function getNews()
	{
		return $this->hasOne(News::className(), ['id' => 'news_id']);
	}
	
}

