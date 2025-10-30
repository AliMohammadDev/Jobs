<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
  public function index()
  {
    $companies = Employer::with('jobs')->paginate(10);

    return view('companies.index', [
      'companies' => $companies
    ]);
  }

  public function edit($id)
  {
    $company = Employer::findOrFail($id);
    return view('companies.edit', compact('company'));
  }


  public function update(Request $request, $id)
  {
    $company = Employer::findOrFail($id);

    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'logo' => 'nullable|image',
    ]);

    if ($request->hasFile('logo')) {
      if ($company->logo && Storage::exists('public/' . $company->logo)) {
        Storage::delete('public/' . $company->logo);
      }

      $validated['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $company->update($validated);

    ToastMagic::success('Company updated successfully!');

    return redirect('/');
  }



  public function destroy($id)
  {
    $company = Employer::findOrFail($id);
    if ($company->logo && Storage::exists('public/' . $company->logo)) {
      Storage::delete('public/' . $company->logo);
    }

    $company->delete();

    ToastMagic::success('Company deleted successfully!');


    return redirect('/');
  }
}