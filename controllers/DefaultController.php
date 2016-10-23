<?php

namespace yiimodules\newsletter\controllers;

use yii\web\Controller;

/**
 * Default controller for the `newsletter` module
 */
class DefaultController extends Controller
{

	public $layout = '@app/modules/admin/views/layouts/newadmin';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
