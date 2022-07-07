<?php

declare(strict_types=1);

namespace app\controllers;

use yii\rest\Controller;
use yii\web\Response;

class BaseController extends Controller
{
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats'] = [];
        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;

        return $behaviors;
    }
}
