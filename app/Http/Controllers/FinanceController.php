<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finance;

class FinanceController extends Controller {
    public function expenseSubmit(Request $req) {
        $req->validate([
            '' => ''
        ]);
    }
}
