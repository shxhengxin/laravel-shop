<?php

namespace App\Http\Controllers\install;

use App\Models\Installment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstallmentsController extends Controller
{
    public function index(Request $request)
    {
        $installments = Installment::query()
            ->where('user_id', $request->user()->id)
            ->paginate(10);

        return view('installments.index', ['installments' => $installments]);
    }
}
