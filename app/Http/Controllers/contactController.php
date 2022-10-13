<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\user;
use App\Models\shortList;
use PDF;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class contactController extends Controller
{
    
    public function login(){
        return view('Auth.login');
    }
    public function LoginSubmit(request $request){
        $user = User::where(['email' => $request->email])->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return "Username or password is not matched";
        } else {
            $request->session()->put('user', $user);
            return redirect('/');
        }
    }
    public function register(){
        return view('Auth.registration');
    }
    public function registerSubmit(request $request){
        $user = new user;
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['confirm_password'] = Hash::make($request->confirm_password);
        $user['password'] = Hash::make($request->password);

        $user->save();
        $request->session()->put('user', $user);

        return redirect('/');
    }
    public function add_contact(){
        return view('Frontend.add_contact');
    }
    public function contactSubmit(request $request){
        if ($request->session()->has('user')) {

            $contact = new contact;
            $contact['name'] = $request->name;
            $contact['email'] = $request->email;
            $contact['phone'] = $request->phone;
            if ($request->hasfile('photo')) {
                $file = $request->file('photo');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/images/', $filename);
                $contact->photo = $filename;
            }
            $contact->save();
            return redirect()->back()->with('flash_message', 'Contact Updated!');  

        } else {
            return redirect('/signin')->with('flash_message', 'Login first!');  
        }  
    }
    public function contactList(){
        return view('Frontend.contactList');
    }
    public  function edit($id)
    {
        $contact = contact::find($id);
        return view('frontend.edit', compact('contact'));
    }
    function delete($id)
    {
        contact::destroy($id);
        return redirect('/');
    }
    public function update_detail(Request $request, $id)
    {
        if ($request->session()->has('user')) {
            $contact =  contact::find($id);
            $contact['name'] = $request->name;
            $contact['email'] = $request->email;
            $contact['phone'] = $request->phone;
            if ($request->hasfile('photo')) {

                $destination='uploads/images/'.$contact->photo;
                if(File::exists($destination)){
                    File::delete($destination);

                }
                $file = $request->file('photo');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/images/', $filename);
                $contact->photo = $filename;
            }
            $contact->update();
            return redirect()->back();  
        } else {
            return redirect('/signin')->with('flash_message', 'Login first!');  
        }    
    }
    
    public function search(Request $request)
    {
        $contact = contact::where('name', 'like', '%' . $request->input('query') . '%')
            ->get();
        return view('frontend/search', ['contact' => $contact]);
    }
    public function pdfGeneration(){

        $contacts = contact::all();
        $pdf_view = PDF::loadView('frontend.pdf_converter', compact('contacts'));
        return $pdf_view->download('myPDF.pdf');
    }
    public function contact_detail($id){
        $contact = contact::find($id);
        return view ('frontend.view_contact')->with('contact', $contact);
    }
    public function add_to_shortlist(Request $request)
    {
        if (Session::get('user')['id']) {

            $shortList['user_id']=Session::get('user')['id'];
            $shortList['phone']=$request->phone;

            $shortList=DB::table('shortLists')->insert($shortList);

            return redirect('/');
        } else {
            return redirect('/signin');
        }
     
    }
    public function shortList()
    {
        $userId =Session::get('user')['id'];
        $contacts = DB::table('shortlists')
            ->join('contacts', 'shortLists.phone', '=', 'contacts.phone')
            ->where('shortLists.user_id', $userId)
            ->select('contacts.*', 'shortLists.phone as phone')
            ->get();

        return view('frontend.Shortlist', ['contacts' => $contacts]);
    }
   

}

