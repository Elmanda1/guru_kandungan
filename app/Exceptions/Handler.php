<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Telegram\Bot\Laravel\Facades\Telegram;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            if ($e instanceof \Exception) {
                $message = $e->getMessage();
                $this->sendTelegramMessage($message);
            }
        });
    }

    private function sendTelegramMessage($message)
    {
        Telegram::bot()->sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'text' => $message,
        ]);
    }
}
