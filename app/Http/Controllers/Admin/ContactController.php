<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Services\WhatsAppService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    protected WhatsAppService $whatsappService;

    public function __construct(WhatsAppService $whatsappService)
    {
        $this->whatsappService = $whatsappService;
    }

    public function index(): View
    {
        $contacts = Contact::latest()->paginate(15);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact): View
    {
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Pesan kontak berhasil dihapus.');
    }

    public function sendWhatsApp(Contact $contact): RedirectResponse
    {
        if (!$contact->phone) {
            return back()->with('error', 'Nomor telepon tidak tersedia untuk mengirim WhatsApp.');
        }

        $success = $this->whatsappService->sendContactNotification([
            'name' => $contact->name,
            'email' => $contact->email,
            'phone' => $contact->phone,
            'subject' => $contact->subject,
            'message' => $contact->message,
            'attachment' => $contact->attachment,
        ]);

        if ($success) {
            return back()->with('success', 'Notifikasi WhatsApp berhasil dikirim.');
        }

        return back()->with('error', 'Gagal mengirim notifikasi WhatsApp. Pastikan konfigurasi WhatsApp sudah benar.');
    }

    public function downloadAttachment(Contact $contact)
    {
        if (!$contact->attachment) {
            return back()->with('error', 'File lampiran tidak ditemukan.');
        }

        $filePath = 'contact-attachments/' . $contact->attachment;

        if (!\Illuminate\Support\Facades\Storage::exists($filePath)) {
            return back()->with('error', 'File lampiran tidak ditemukan di sistem.');
        }

        return \Illuminate\Support\Facades\Storage::download($filePath, basename($contact->attachment));
    }
}
