<?php

namespace App\Http\Controllers\Backend;

use index;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\VendorListDataTable;

class VendorListController extends Controller
{
    public function index(VendorListDataTable $dataTable)
    {
        return $dataTable->render('admin.vendor-list.index');
    }

    public function changeStatus(Request $request)
    {
        $customer = User::findOrFail($request->id);
        $customer->status = $request->status == 'true' ? 'active' : 'inactive';
        $customer->save();

        return response(['message' => 'Status has been updated!']);
    }
}
