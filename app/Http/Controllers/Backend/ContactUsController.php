<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactUsController extends Controller
{
    public function __construct(){
        if (\auth()->check()){
            $this->middleware('auth');
        }else{
            return view('backend.auth.login');
        }
    }
    public function index()
    {
        if (!\auth()->user()->ability('admin','mange_contact_us,show_contact_us')){
            return  redirect('admin/index') ;
        }
        $keyword = (isset(\request()->keyword) && \request()->keyword != '') ? \request()->keyword : null;
        $status = (isset(\request()->status) && \request()->status != '') ? \request()->status : null;
        $sort_by = (isset(\request()->sort_by) && \request()->sort_by != '') ? \request()->sort_by : 'id';
        $order_by = (isset(\request()->order_by) && \request()->order_by != '') ? \request()->order_by : 'desc';
        $limit_by = (isset(\request()->limit_by) && \request()->limit_by != '') ? \request()->limit_by : '10';

        $messages = Contact::query();
        if ($keyword != null) {
            $messages = $messages->search($keyword);
        }

        if ($status != null) {
            $messages = $messages->whereStatus($status);
        }

        $messages = $messages->orderBy($sort_by, $order_by);
        $messages = $messages->paginate($limit_by);

        return view('backend.contact_us.index', compact('messages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                if (!\auth()->user()->ability('admin','display_pages')){
            return  redirect('admin/index') ;
        }
        $message = Contact::whereId($id)->first();
                if ($message && $message->status ==0 ){
                    $message->status = 1;
                    $message->save();
                }
        return view('backend.contact_us.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!\auth()->user()->ability('admin','delete_contact_us')){
        return  redirect('admin/index') ;
    }

        $messages = Contact::whereId($id)->first();

        if ($messages) {


            $messages->delete();

            return redirect()->route('admin.contact_us.index')->with([
                'message' => 'Message Deleted successfully',
                'alert-type' => 'success',
            ]);

        }
        return redirect()->route('admin.contact_us.index')->with([
            'message' => 'Something was wrong',
            'alert-type' => 'danger',
        ]);
    }
}
