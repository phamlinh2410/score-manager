<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class SubjectController extends Controller
{
    public function index() {
        $subjects = Subject::all();
        return view('subject.search', compact('subjects'));
    }
    
    public function registerForm()
    {
        return view('subject.registration-form');
    }

    public function confirmRegister(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'schoolYear' => 'required',
            'description' => 'required|max:1000',
            'avatar' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect(route('subject.registration-form'))->withErrors($validator)->withInput();
        } else {
            $datas = [
                'name' => $request->get('name'),
                'schoolYear' => $request->get('school_year'),
                'description' => $request->get('description')
            ];
            
            $image = $request->file('avatar');
            $avatar_name = time().'_subject.'.$image->getClientOriginalExtension();
            $destination = public_path('avatar');
            $image->move($destination, $avatar_name);
            $datas['avatar'] = $avatar_name;

            $request->session()->put('avatar', $avatar_name);
            // dd($datas['name']);
            return view('subject.registration-confirm-form', compact('datas'));
        }
        
    }

    public function submitRegister(Request $request)
    {
        $avatar_name = $request->session()->get('avatar');
        $request->session()->forget('avatar');
        // dd($avatar_name);
        // dd(explode('/', $avatar_name)[-1]);
        $datas = [
            'name' => $request->get('name'),
            'school_year' => $request->get('school_year'),
            'description' => $request->get('description'),
            'avatar' => $avatar_name
        ];

        Subject::create($datas);

        return redirect(route('subject.register.successfull'));
        
    }

    public function registerSuccessfull()
    {
        return view('subject.register-successfull');
    }

    public function search(Request $request)
    {
        $subjects = [];
        $school_year = $request->get('school_year');
        // dd($school_year);
        $key_word = $request->get('key_word');
        if($school_year == "" && $key_word == ""){
            $subjects = Subject::all();
        }
        if($school_year != ""){
            $subjects = Subject::where('school_year', '=', $school_year)->get();
        }
        if($key_word != ""){
            $subjects = Subject::where('name', 'LIKE', '%'.$key_word.'%')
                                ->orwhere('description', 'LIKE', '%'.$key_word.'%')
                                ->get();
        }
        if($school_year != "" && $key_word != ""){
            $subjects = Subject::where('school_year', '=', $school_year)
                            ->where('name', 'LIKE', '%'.$key_word.'%')
                            ->orwhere('description', 'LIKE', '%'.$key_word.'%')
                            ->get();
        }
        // dd($subjects);
        return view('subject.search', compact('subjects'));
    }

    public function edit($id)
    {
        dd($id);
    }
}
