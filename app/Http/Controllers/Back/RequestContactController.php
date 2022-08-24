<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestContactStoreRequest;
use App\Http\Requests\RequestContactUpdateRequest;
use App\Models\RequestContact;
use Illuminate\Http\Request;

class RequestContactController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $requestContacts = RequestContact::all();

        return view('back.requestContact.index', compact('requestContacts'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('requestContact.create');
    }

    /**
     * @param \App\Http\Requests\RequestContactStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestContactStoreRequest $request)
    {
        $requestContact = RequestContact::create($request->validated());

        $request->session()->flash('requestContact.id', $requestContact->id);

        return redirect()->route('requestContact.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RequestContact $requestContact
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RequestContact $requestContact)
    {
        return view('requestContact.show', compact('requestContact'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RequestContact $requestContact
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RequestContact $requestContact)
    {
        return view('requestContact.edit', compact('requestContact'));
    }

    /**
     * @param \App\Http\Requests\RequestContactUpdateRequest $request
     * @param \App\Models\RequestContact $requestContact
     * @return \Illuminate\Http\Response
     */
    public function update(RequestContactUpdateRequest $request, RequestContact $requestContact)
    {
        $requestContact->update($request->validated());

        $request->session()->flash('requestContact.id', $requestContact->id);

        return redirect()->route('requestContact.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RequestContact $requestContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RequestContact $requestContact)
    {
        $requestContact->delete();

        return redirect()->route('requestContact.index');
    }
}
