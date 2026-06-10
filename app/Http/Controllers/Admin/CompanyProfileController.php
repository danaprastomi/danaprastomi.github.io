<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CompanyProfileController extends Controller
{
    public function index(): View
    {
        $profiles = CompanyProfile::orderBy('key')->get();

        return view('admin.company-profile.index', compact('profiles'));
    }

    public function create(): View
    {
        return view('admin.company-profile.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'key' => ['required', 'string', 'max:255', 'unique:company_profiles,key'],
            'value' => ['required', 'string', 'max:5000'],
        ]);

        CompanyProfile::create($validated);

        return redirect()->route('admin.company-profile.index')
            ->with('success', 'Profil perusahaan berhasil ditambahkan.');
    }

    public function edit(CompanyProfile $companyProfile): View
    {
        return view('admin.company-profile.edit', compact('companyProfile'));
    }

    public function update(Request $request, CompanyProfile $companyProfile): RedirectResponse
    {
        $validated = $request->validate([
            'key' => ['required', 'string', 'max:255', Rule::unique('company_profiles', 'key')->ignore($companyProfile->id)],
            'value' => ['required', 'string', 'max:5000'],
        ]);

        $companyProfile->update($validated);

        return redirect()->route('admin.company-profile.index')
            ->with('success', 'Profil perusahaan berhasil diperbarui.');
    }

    public function destroy(CompanyProfile $companyProfile): RedirectResponse
    {
        $companyProfile->delete();

        return redirect()->route('admin.company-profile.index')
            ->with('success', 'Profil perusahaan berhasil dihapus.');
    }
}
