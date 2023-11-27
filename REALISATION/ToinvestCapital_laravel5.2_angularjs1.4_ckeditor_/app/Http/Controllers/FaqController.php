<?php

namespace ToInvestCapital\Http\Controllers;

use Illuminate\Http\Request;

use \ToInvestCapital\Faq;
use ToInvestCapital\Http\Requests;

class FaqController extends Controller
{

    public function index()
    {
        $faqs = \ToInvestCapital\Faq::orderBy('created_at', 'desc' )->get();
        return view('admin.faq')->with(['faqs'=> $faqs]);
    }

    public function delete($id)
    {
        \ToInvestCapital\Faq::where(['id'=>$id])->delete();
        return back();
    }

    public function postQuestion(Request $r)
    {
        $code = $r->input('CaptchaCode');

        $isHuman = captcha_validate($code);

        if ($isHuman) {
            Faq::create($r->input());
        }else{
            session('error', 'please retry, incorrect code ! ');
        }
        return back();
    }
    public function update(Request $r)
    {
        $faq = Faq::findorfail($r->input('id'));
        $faq->responce = $r->input('responce');
        $faq->save();
        return back();
    }

    public function create(Request $req){

        $faq = $req->input('faq');
        \ToInvestCapital\Faq::create($faq);
        return redirect('dashboard/articles/faq');

    }
}
