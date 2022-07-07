<?php

declare(strict_types=1);

namespace app\controllers;

use app\services\cart\CartService;
use DomainException;
use yii\helpers\Json;
use yii\web\Request;

class CartController extends BaseController
{
    private CartService $cartService;

    public function __construct(
        $id,
        $module,
        CartService $cartService,
        $config = []
    )
    {
        $this->cartService = $cartService;
        parent::__construct($id, $module, $config);
    }

    /**
     * Расчёт стоимости корзины
     * @param Request $request
     */
    public function actionCalculation(Request $request)
    {
        try {
            $data = Json::decode($request->rawBody);
            $calculatedData = $this->cartService->calculate($data);

            $this->asJson($calculatedData);
        } catch (DomainException $exception) {
            $this->response->statusCode = 400;
            $this->asJson(['message' => $exception->getMessage()]);
        }
    }
}
