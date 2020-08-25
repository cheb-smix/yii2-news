<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Rubric model
 *
 * @property integer $id
 * @property string $title
 * @property integer $parent_rubric_id
 */

class Rubric extends ActiveRecord
{
	
	public function attributeLabels()
	{
		return [
			'title'=>'Заголовок',
			'parent_rubric_id'=>'Родительская рубрика'
		];
	}

	public function rules()
	{
		return [
			[ ['title'], 'required' ],
			[ ['title'], 'string', 'length'=>[5,70], 'message'=>'Wrong' ],
		];
	}

	public function getChildren()
	{
		return $this->hasMany(Rubric::className(), ['parent_rubric_id' => 'id'])->with("children");
	}
	
    public function getNews()
    {
        return $this->hasMany(NewsToRubric::className(), ['rubric_id' => 'id'])->with("news");
	}
	
}

