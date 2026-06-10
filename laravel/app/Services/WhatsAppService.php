<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected string $apiUrl;
    protected string $apiKey;
    protected string $phoneNumber;

    public function __construct()
    {
        $this->apiUrl = config('services.whatsapp.api_url');
        $this->apiKey = config('services.whatsapp.api_key');
        $this->phoneNumber = config('services.whatsapp.phone_number');
    }

    /**
     * Send WhatsApp message notification
     */
    public function sendContactNotification(array $contactData): bool
    {
        if (!$this->isConfigured()) {
            Log::warning('WhatsApp service not configured');
            return false;
        }

        try {
            $message = $this->buildNotificationMessage($contactData);
            $recipient = $this->formatPhoneNumber($this->phoneNumber);

            $response = Http::timeout(10)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ])
                ->post($this->apiUrl, [
                    'messaging_product' => 'whatsapp',
                    'to' => $recipient,
                    'type' => 'text',
                    'text' => [
                        'preview_url' => true,
                        'body' => $message,
                    ],
                ]);

            if ($response->successful()) {
                Log::info('WhatsApp notification sent successfully', ['to' => $recipient]);
                return true;
            }

            Log::error('WhatsApp notification failed', [
                'status' => $response->status(),
                'response' => $response->body(),
            ]);

            return false;
        } catch (\Exception $e) {
            Log::error('WhatsApp notification error', ['message' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * Build formatted notification message
     */
    protected function buildNotificationMessage(array $contactData): string
    {
        $attachmentText = !empty($contactData['attachment']) ? "\n📎 Lampiran: Ada" : "";
        $phone = $contactData['phone'] ?? 'Tidak ada';

        return <<<MESSAGE
🔔 *Pesan Kontak Baru*

👤 *Nama:* {$contactData['name']}
📧 *Email:* {$contactData['email']}
📱 *Telepon:* {$phone}
📝 *Subjek:* {$contactData['subject']}

💬 *Pesan:*
{$contactData['message']}{$attachmentText}

⏰ *Waktu:* {$this->getCurrentTime()}
MESSAGE;
    }

    /**
     * Format phone number to international format
     */
    protected function formatPhoneNumber(string $phone): string
    {
        // Remove all non-numeric characters
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Add country code if not present (assume Indonesia: 62)
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        } elseif (substr($phone, 0, 2) !== '62') {
            $phone = '62' . $phone;
        }

        return $phone;
    }

    /**
     * Get current time in Jakarta timezone
     */
    protected function getCurrentTime(): string
    {
        return now()->timezone('Asia/Jakarta')->format('d M Y, H:i');
    }

    /**
     * Check if WhatsApp service is configured
     */
    public function isConfigured(): bool
    {
        return !empty($this->apiUrl)
            && !empty($this->apiKey)
            && !empty($this->phoneNumber);
    }
}
