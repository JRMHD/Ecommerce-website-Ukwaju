<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminCustomerController extends Controller
{
    public function index(Request $request)
    {
        // Search functionality
        $search = $request->input('search');

        $customers = User::whereHas('orders')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            })
            ->latest() // Sort latest first
            ->paginate(15); // Pagination with 15 results per page

        return view('admin.customers.index', compact('customers'));
    }


    public function export()
    {
        $customers = User::whereHas('orders')->get(['name', 'email']);

        $response = new StreamedResponse(function () use ($customers) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Name', 'Email']);

            foreach ($customers as $customer) {
                fputcsv($handle, [$customer->name, $customer->email]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="customers.csv"');

        return $response;
    }
}
