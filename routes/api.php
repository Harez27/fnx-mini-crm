<?php

use App\Models\Company;
use Illuminate\Support\Facades\Route;

Route::get('/companies/{company}', function (Company $company) {
    $company->load('employees');

    $company->setAttribute(
        'employee_count',
        $company->employees->count()
    );

    return response()->json($company);
});
