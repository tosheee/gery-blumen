<?php

namespace App\Http\Controllers\Admin;

use App\Admin\SupportMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportMessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $supportMessages = SupportMessage::all();

        return view('admin.support_messages.index')->with('supportMessages', $supportMessages)->with('title', 'Всички Съобщения');
    }


    public function create()
    {
        return view('admin.support_messages.create')->with('title', 'Създаване на съобщение');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_support_messages'    => 'required',
            'content_support_messages' => 'required',
        ]);

        $subCategory = new SupportMessage();
        $subCategory->name_support_messages    = $request->input('name_support_messages');
        $subCategory->content_support_messages = $request->input('content_support_messages');
        $subCategory->save();

        return redirect('admin/support_messages')->with('success', 'Подкатегорията е създадена');
    }

    public function edit($id)
    {
        $supportMessage = SupportMessage::find($id);

        return view('admin.support_messages.edit')->with('supportMessage', $supportMessage)->with('title', 'Обновяване на съобщение');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name_support_messages'    => 'required',
            'content_support_messages' => 'required',
        ]);

        $subCategory = SupportMessage::find($id);
        $subCategory->name_support_messages    = $request->input('name_support_messages');
        $subCategory->content_support_messages = $request->input('content_support_messages');
        $subCategory->save();

        return redirect('admin/support_messages')->with('success', 'Подкатегорията е убновена');
    }

    public function destroy($id)
    {
        $subCategory = SupportMessage::find($id);
        $subCategory->delete();

        return redirect('admin/support_messages')->with('success', 'Съобщението е премахнато');
    }
}
