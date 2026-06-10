<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Slider;
use App\Services\WhatsAppService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    protected WhatsAppService $whatsappService;

    public function __construct(WhatsAppService $whatsappService)
    {
        $this->whatsappService = $whatsappService;
    }

    public function index(): View
    {
        $sliders = Slider::active()->ordered()->get();
        // Fetch up to 8 featured services/products for the homepage preview
        $featuredServices = Service::active()->ordered()->take(8)->get();

        return view('home', compact('sliders', 'featuredServices'));
    }

    public function about(): View
    {
        return view('about');
    }

    public function visiMisi(): View
    {
        return view('visi-misi');
    }

    public function produk(Request $request): View
    {
        $query = Service::active()->ordered();

        // Filter by category slug if provided
        if ($request->filled('category')) {
            $categorySlug = $request->query('category');
            $allCategories = Service::active()
                ->whereNotNull('category')
                ->distinct()
                ->pluck('category');

            $matchedCategory = $allCategories->first(function ($cat) use ($categorySlug) {
                return \Illuminate\Support\Str::slug($cat) === $categorySlug;
            });

            if ($matchedCategory) {
                $query->where('category', $matchedCategory);
            }
        }

        // Search by name or description
        if ($request->filled('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $services = $query->paginate(12)->withQueryString();

        return view('produk', compact('services'));
    }

    public function kontak(): View
    {
        return view('kontak');
    }

    public function klienKami(): View
    {
        // Define list of premium clients
        $clients = [
            [
                'name' => 'PT. Pertamina (Persero)',
                'industry' => 'Energi & Migas',
                'description' => 'Penyediaan perlengkapan keselamatan kerja (safety equipment) standar tinggi untuk operasional kilang.',
                'logo_initial' => 'P',
                'bg_color' => 'bg-red-500',
            ],
            [
                'name' => 'PT. Waskita Karya (Persero) Tbk',
                'industry' => 'Konstruksi & Infrastruktur',
                'description' => 'Suplai material konstruksi dan alat perlengkapan kerja untuk proyek jalan tol dan gedung.',
                'logo_initial' => 'W',
                'bg_color' => 'bg-blue-600',
            ],
            [
                'name' => 'PT. Wijaya Karya (Persero) Tbk',
                'industry' => 'Infrastruktur & Properti',
                'description' => 'Penyediaan alat tulis kantor (ATK) massal dan suku cadang mekanikal elektrikal.',
                'logo_initial' => 'WK',
                'bg_color' => 'bg-cyan-700',
            ],
            [
                'name' => 'PT. Unilever Indonesia Tbk',
                'industry' => 'Consumer Goods',
                'description' => 'Pemasangan AC sistem chiller industri dan suplai safety equipment berkala.',
                'logo_initial' => 'U',
                'bg_color' => 'bg-blue-900',
            ],
            [
                'name' => 'PT. Adhi Karya (Persero) Tbk',
                'industry' => 'Konstruksi',
                'description' => 'Penyediaan bahan bangunan khusus, kaca alumunium, dan jasa instalasi mekanikal.',
                'logo_initial' => 'A',
                'bg_color' => 'bg-emerald-600',
            ],
            [
                'name' => 'PT. Indofood Sukses Makmur Tbk',
                'industry' => 'Makanan & Minuman',
                'description' => 'Penyediaan furniture kantor premium, karpet, meja meeting, serta jasa interior desain.',
                'logo_initial' => 'I',
                'bg_color' => 'bg-yellow-600',
            ],
        ];

        // Define premium testimonials
        $testimonials = [
            [
                'client_name' => 'Budi Santoso',
                'role' => 'Procurement Manager',
                'company' => 'PT. Waskita Karya',
                'rating' => 5,
                'comment' => 'CV. Cakrawala Langit Semesta selalu menjadi partner pengadaan andalan kami. Pengiriman barang cepat, kualitas terjamin, dan harga sangat kompetitif untuk proyek skala besar.',
                'avatar_letter' => 'B',
            ],
            [
                'client_name' => 'Siti Rahmawati',
                'role' => 'GA & Facilities Supervisor',
                'company' => 'PT. Unilever Indonesia',
                'rating' => 5,
                'comment' => 'Instalasi AC Chiller dan suplai safety equipment dari CLS berjalan dengan profesional. Respon tim cepat dan layanan purna jualnya luar biasa.',
                'avatar_letter' => 'S',
            ],
            [
                'client_name' => 'Hendra Wijaya',
                'role' => 'Project Coordinator',
                'company' => 'PT. Adhi Karya',
                'rating' => 4,
                'comment' => 'Kami sangat puas dengan suplai marmer dan pengerjaan interior dari CLS. Rapi, presisi, dan sesuai dengan tenggat waktu yang disepakati.',
                'avatar_letter' => 'H',
            ],
        ];

        return view('klien-kami', compact('clients', 'testimonials'));
    }

    public function contact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'attachment' => ['nullable', 'file', 'mimes:jpg,jpeg,png,gif,pdf,doc,docx,xls,xlsx,txt,zip', 'max:5120'],
        ]);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('contact-attachments', $fileName);
            $validated['attachment'] = $fileName;
        }

        $contact = Contact::create($validated);

        // Send WhatsApp notification
        $this->whatsappService->sendContactNotification($validated);

        return back()->with('success', 'Pesan Anda berhasil dikirim. Terima kasih!');
    }
}
