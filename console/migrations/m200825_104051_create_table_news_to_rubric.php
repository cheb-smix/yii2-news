<?php

use yii\db\Migration;

/**
 * Class m200825_104051_create_table_news_to_rubric
 */
class m200825_104051_create_table_news_to_rubric extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news_to_rubric}}', [
            'news_id' => $this->integer(),
            'rubric_id' => $this->integer()
        ]);

        Yii::$app->db->createCommand()->batchInsert('{{%news_to_rubric}}', ['news_id','rubric_id'], [
            ['1','4'],
            ['2','5'],
            ['3','5'],
            ['4','1'],
            ['4','6'],
            ['5','1'],
            ['5','7'],
            ['6','1'],
            ['7','2'],
            ['7','6'],
            ['7','8'],
        ])->execute();

        $this->createIndex(
            'idx-news_to_rubric-news_id',
            'news_to_rubric',
            'news_id'
        );

        $this->addForeignKey(
            'fk-news_to_rubric-news_id',
            'news_to_rubric',
            'news_id',
            'news',
            'id'
        );

        $this->createIndex(
            'idx-news_to_rubric-rubric_id',
            'news_to_rubric',
            'rubric_id'
        );

        $this->addForeignKey(
            'fk-news_to_rubric-rubric_id',
            'news_to_rubric',
            'rubric_id',
            'rubric',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-news_to_rubric-news_id',
            'news_to_rubric'
        );

        $this->dropIndex(
            'idx-news_to_rubric-news_id',
            'news_to_rubric'
        );
        $this->dropForeignKey(
            'fk-news_to_rubric-rubric_id',
            'news_to_rubric'
        );

        $this->dropIndex(
            'idx-news_to_rubric-rubric_id',
            'news_to_rubric'
        );
        $this->dropTable('{{%news_to_rubric}}');
    }
}
