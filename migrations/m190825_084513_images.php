<?php

use yii\db\Migration;

/**
 * Class m190825_084513_images
 */
class m190825_084513_images extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $tableOptions = null;
 
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('images', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull()->unique(),
            'album' => $this->string(32)->notNull(),
            'order' => $this->integer()->notNull()->defaultValue(0),
            'upload' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('images');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190825_084513_images cannot be reverted.\n";

        return false;
    }
    */
}
