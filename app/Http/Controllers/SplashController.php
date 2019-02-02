<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\User;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SplashController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function ladder()
    {
        return view('ladder');
    }

    public function entries()
    {
        return view('entries');
    }


    public function rules()
    {
        return view('rules');
    }

    public function shirts()
    {
        return view('shirts.index');
    }

    public function create()
    {
        return view('shirts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'size' => [
                'required',
                Rule::in(['small', 'medium', 'large']),
            ]
        ]);

        Auth::user()->requests()->create([
            'size' => $request->input('size'),
        ]);

        return redirect()->route('shirts');
    }

    public function Delete(\App\Request $request)
    {
        if ($request->user->id != Auth::user()->id)
            abort(403, 'Access Denied.');

        $request->delete();
        return redirect()->route('shirts');
    }

	public function gallery()
	{
		return view('gallery');
	}

    public function contact()
    {
        return view('contact');
    }

    /**
     * Handle a contact us form request.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function email(Request $request)
    {
        $rules = collect([
            'subject' => 'required|max:255',
            'body' => 'required',
        ]);

        if (Auth::guest())
            $rules->merge([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
            ]);

        $this->validate($request, $rules->toArray());

        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $body = $request->input('body');

        if (! Auth::guest()) {
            $name = Auth::user()->name;
            $email = Auth::user()->email;
        }

        Mail::to(User::admin()->get())->queue(new Contact(
            $name,
            $email,
            $subject,
            $body
        ));

        return redirect()->route('contact')->with('status', 'sent');
    }
}
