<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Slider;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'sliders' => Slider::count(),
            'services' => Service::count(),
            'unread_contacts' => Contact::unread()->count(),
            'total_contacts' => Contact::count(),
            'users' => User::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
