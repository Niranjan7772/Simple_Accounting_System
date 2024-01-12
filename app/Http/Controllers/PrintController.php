<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function index()
      {
            $invoices = invoice::all();
            return view('printInv')->with('invoices', $invoices);;
      }
      public function prnpriview()
      {
        $invoices = invoice::all();
            return view('inv')->with('invoices', $invoices);;
      }
}
