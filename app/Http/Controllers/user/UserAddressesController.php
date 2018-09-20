<?php

namespace App\Http\Controllers\user;

use App\Http\Requests\UserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAddressesController extends Controller
{
    public function index(Request $request) {
        //$data = $request->user()->addresses;
        $data = request()->user()->addresses;
        return view('user_addresses.index', ['addresses' => $data,]);
    }

    public function create() {
        return view('user_addresses.create_and_edit', ['address' => new UserAddress()]);
    }

    public function store(UserAddressRequest $request) {
        $request->user()->addresses()->create($request->only(['province','city','district','address','zip','contact_name','contact_phone']));
        return redirect()->route('user_addresses.index');
    }

    public function edit(UserAddress $user_address)
    {
        $this->authorize('own', $user_address);
        return view('user_addresses.create_and_edit', ['address' => $user_address]);
    }

    public function update(UserAddress $user_address, UserAddressRequest $request)
    {
        $this->authorize('own', $user_address);
        $user_address->update($request->only(['province','city','district','address','zip','contact_name','contact_phone' ]));
        return redirect()->route('user_addresses.index');
    }

    public function destroy(UserAddress $user_address)
    {
        $this->authorize('own', $user_address);
        $user_address->delete();
        return [];
    }
}
