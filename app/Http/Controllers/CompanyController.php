<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::withCount('employees')
            ->latest()
            ->paginate(10);

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyRequest $request)
    {
        $data = $request->validated();
        unset($data['logo']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')
                ->store('company-logos', 'public');
        }

        Company::create($data);

        return redirect()
            ->route('companies.index')
            ->with('success', 'Company created successfully.');
    }

    public function show(Company $company)
    {
        $company->loadCount('employees');
        $company->load('employees');

        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $data = $request->validated();
        unset($data['logo']);

        $oldLogo = $company->logo;

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')
                ->store('company-logos', 'public');
        }

        $company->update($data);

        if (isset($data['logo']) && $oldLogo) {
            Storage::disk('public')->delete($oldLogo);
        }

        return redirect()
            ->route('companies.index')
            ->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        if ($company->employees()->exists()) {
            return back()->with(
                'error',
                'Remove or reassign this company’s employees before deleting it.'
            );
        }

        $logo = $company->logo;
        $company->delete();

        if ($logo) {
            Storage::disk('public')->delete($logo);
        }

        return redirect()
            ->route('companies.index')
            ->with('success', 'Company deleted successfully.');
    }
}