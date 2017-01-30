<?php  
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;


class Search extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('Search');
    }
}


?>