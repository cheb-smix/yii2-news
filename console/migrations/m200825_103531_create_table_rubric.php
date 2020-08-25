<?php

use yii\db\Migration;

/**
 * Class m200825_103531_create_table_rubric
 */
class m200825_103531_create_table_rubric extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rubric}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(70)->notNull(),
            'parent_rubric_id' => $this->integer()->defaultValue(0)
        ]);

        Yii::$app->db->createCommand()->batchInsert('{{%rubric}}', ['title'], [
            ['Общество'],['День города'],['0-3 года'],['3-7 года'],['Спорт']
        ])->execute();

        Yii::$app->db->createCommand()->batchInsert('{{%rubric}}', ['title','parent_rubric_id'], [
            ['Городская жизнь',1],
            ['Выборы',1],
            ['Салюты',2],
            ['Детская площадка',2]
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rubric}}');
    }
}
