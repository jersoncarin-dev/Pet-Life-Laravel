<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Appointment extends Model
{
    use HasFactory;

    public $guarded = [];

    protected static function booted()
    {
        static::updated(function ($appointment) {
            $tokens = Token::where("user_id",$appointment->user_id)->pluck('token');

            $body = $appointment->is_approved
                ? "Your appointment of the selected product has been approved, Thank you!"
                : "Your appointment of the selected product has been rejected, If you feel that you're not wrong feel free to contact us.";

            $content = [
                'registration_ids' => $tokens,
                'notification' => [
                    'title' => 'Appointment has been '. ($appointment->is_approved ? 'approved.' : 'rejected.'),
                    'body' => [
                        'status' => $appointment->is_approved ? 'success' : 'error',
                        'message' => $body
                    ]
                ]
            ];

            Http::withToken('AAAAHIFmX60:APA91bHnYbEhEv5Xv69UGbz0TW_L3rYlJaay_JSSbO0Go98NYz7X8xzvVHHqOAwv34rIuvpX1LrJaUhOI62IXlJTSP6xKgI1l36203lRKn-35XhzjYODBUjB9ZpoQTh-M8io8QjrrPs5')
                ->withBody(json_encode($content),'application/json')
                ->post('https://fcm.googleapis.com/fcm/send');
        });
    }
}
