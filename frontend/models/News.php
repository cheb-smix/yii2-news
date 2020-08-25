<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * News model
 *
 * @property integer $id
 * @property string $title
 * @property string $text\
 */

class News extends ActiveRecord{
	public function attributeLabels()
	{
		return [
			'title'=>'Заголовок',
			'text'=>'Текст новости'
		];
	}
	public function rules()
	{
		return [
			[ ['title'], 'required' ],
			[ ['title'], 'string', 'length'=>[5,120], 'message'=>'Wrong' ],
		];
	}
	public function getRubric()
	{
		return $this->hasMany(NewsToRubric::className(), ['news_id' => 'id'])->with("rubric");
	}
}

