<?php

namespace App\Http\Controllers\API;

use App\BankAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $bank_accounts = BankAccount::all();
         $bank_accounts = DB::table('bank_accounts')
            ->join('financial_organizations', 'financial_organizations.id', '=', 'bank_accounts.financial_organization_id')
            ->select('bank_accounts.*','financial_organizations.name as bank_name')
            ->get();
        
        return response()->json([
            'bank_accounts' => $bank_accounts
        ], 200);
    }

    //Bank Account validation
    public function isBankAccountValild(Request $request)
    {
        $this->validate($request, [
            'account_name' => ['required'],
            'financial_organization_id' => ['required'],
            'account_no' => ['required'],
            'branch' => ['required'],
            'account_type' => ['required'],
            'swift_code' => ['required'],
            'route_no' => ['required'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->isBankAccountValild($request);

        $bank_account = new BankAccount(); // where is the Setting class

        $bank_account->account_name = $request->account_name;
        $bank_account->financial_organization_id = $request->financial_organization_id;
        $bank_account->account_no = $request->account_no;
        $bank_account->branch = $request->branch;
        $bank_account->account_type = $request->account_type;
        $bank_account->swift_code = $request->swift_code;
        $bank_account->route_no = $request->route_no;

        if ($bank_account->save()) {
            return response()->json([
                "resultStatus" => "1"
            ], 200);
        } else {
            return response()->json([
                "resultStatus" => "0"
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->isBankAccountValild($request);

        $bank_account = BankAccount::findOrFail($request->id);

        $bank_account->account_name = $request->account_name;
        $bank_account->financial_organization_id = $request->financial_organization_id;
        $bank_account->account_no = $request->account_no;
        $bank_account->branch = $request->branch;
        $bank_account->account_type = $request->account_type;
        $bank_account->swift_code = $request->swift_code;
        $bank_account->route_no = $request->route_no;

        if ($bank_account->save()) {
            return response()->json([
                "resultStatus" => "1"
            ], 200);
        } else {
            return response()->json([
                "resultStatus" => "0"
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank_account = BankAccount::findOrFail($id);
        if ($bank_account->delete()) {
            return response()->json([
                "resultStatus" => "1"
            ], 200);
        } else {
            return response()->json([
                "resultStatus" => "0"
            ], 200);
        }
    }
}
