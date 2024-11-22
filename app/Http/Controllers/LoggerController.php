<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\DTO\ConfigParams;
use App\Http\Requests\ActionLogRequest;
use App\Http\Requests\ActionLogWithTypeRequest;
use App\Services\LoggerService;
use Illuminate\Http\JsonResponse;

class LoggerController extends Controller
{
    public function __construct(private readonly LoggerService $loggerService)
    {

    }

    private const ALL_TYPES = [
        'email', 'file', 'database'
    ];

    public function actionLog(ActionLogRequest $request): JsonResponse
    {
        $message = $request->getMessage();

        $this->loggerService->sendDefault(ConfigParams::fromArray(config('logger')), $message);

        return response()->json(['message' => 'Result:' . $message]);
    }

    public function actionLogTo(ActionLogWithTypeRequest $request): JsonResponse
    {
        $this->loggerService->sendByLogger(
            ConfigParams::fromArray(config('logger')),
            $request->getMessage(),
            $request->getType()
        );

        return response()->json(['message' => 'Result with type:' . $request->getMessage()]);
    }

    public function actionLogToAll(ActionLogRequest $request): JsonResponse
    {
        foreach (self::ALL_TYPES as $type) {
            $this->loggerService->send(
                ConfigParams::fromArray(config('logger')),
                $request->getMessage(),
                $type
            );
        }

        return response()->json(['message' => 'Result all:' . $request->getMessage()]);
    }
}
