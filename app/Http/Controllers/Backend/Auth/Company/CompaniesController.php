<?php

namespace App\Http\Controllers\Backend\Auth\Company;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('backend.auth.company.index', compact('companies'));
    }

    public function create()
    {
        return view('backend.auth.company.create');
    }

    public function store(Request $request)
    {
        $company = new Company(request()->validate([
            'name' => 'required'
        ]));

        $company->save();

        return redirect()->route('admin.auth.company.index')->withFlashSuccess(__('alerts.backend.companies.created'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('backend.auth.company.edit', compact( 'company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update(request()->validate([
            'name' => 'required'
        ]));

        return redirect()->route('admin.auth.company.index')->withFlashSuccess(__('alerts.backend.companies.updated'));
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect(route('admin.auth.company.index'));
    }

}
