<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;

class WhatsAppService {
    protected string $token;
    protected string $phoneId;
    protected string $version;

    public function __construct()
    {
        $this->token = config('services.whatsapp.token');
        $this->phoneId = config('services.whatsapp.phone_id');
        $this->version = config('services.whatsapp.version');
    }

    public function sendPrescription(string $to, 
        string $pharmacyName, 
        string $clientName, 
        array $medicines): array
    {
        $endpoint = "https://graph.facebook.com/{$this->version}/{$this->phoneId}/messages";

        // تنظيف الرقم من أي رموز أو مسافات (يجب أن يكون بالصيغة الدولية بدون +)
        $cleanPhone = preg_replace('/[^0-9]/', '', $to);

        $medicinesText = "";
        foreach ($medicines as $index=>$item) {
            $name = trim($item['medication']['name']);
    $dosage = trim($item['dosage']);
    $frequency = trim($item['frequency']);
    $num = $index + 1;
    $medicinesText .= "({$num}) دواء {$name} [الجرعة: {$dosage} - التكرار: {$frequency}]  ";
    // $medicinesText .= "• دواء {$name}: {$dosage} {$frequency} | ";

            // $medicinesText .= "• دواء {$item['medication']['name']}: {$item['dosage']} {$item['frequency']}   ";
        }

        $response = Http::withToken($this->token)->post($endpoint, [
            'messaging_product' => 'whatsapp',
            'to' => $cleanPhone,
            'type' => 'template',
            'template' => [
                'name' => 'dosage_reminder',
                'language' => [
                    'code' => 'ar',
                ],
                'components' => [
                    // 1. مكون العنوان (Header Component)
                    [
                        'type' => 'header',
                        'parameters' => [
                            ['type' => 'text', 'text' => $pharmacyName], // {{1}} في Header
                        ],
                    ],
                    // 2. مكون نص الرسالة (Body Component)
                    [
                        'type' => 'body',
                        'parameters' => [
                            [
                        'type' => 'text',
                        'parameter_name' => 'customer_name', 
                        'text' => $clientName
                    ],
                    [
                        'type' => 'text',
                        'parameter_name' => 'text', 
                        'text' => $medicinesText
                    ],
                        ],
                    ],
                ],
            ],
        ]);

        // $response = Http::withToken($this->token)->post($endpoint, [
        //     'messaging_product' => 'whatsapp',
        //     'to' => $cleanPhone,
        //     'type' => 'template',
        //     'template' => [
        //         'name' => $templateName,
        //         'language' => [
        //             'code' => $languageCode,
        //         ],
        //     ],
        // ]);

        return $response->json();
    }

}