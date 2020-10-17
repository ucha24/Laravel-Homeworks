<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $columns = [
            [
                'title'=>'Lorem 1',
                'content'=>'Lorem Ipsum 1'
            ],
            [
                'title'=>'Lorem 2',
                'content'=>'Lorem Ipsum 3'
            ],
            [
                'title'=>'Lorem 3',
                'content'=>'Lorem Ipsum 3'
            ]
        ];
        $showFooter = true;
        $page = ['title'=>'Home Page','theme'=>'dark','data'=>$columns];
        return view('pages.home',compact('page','showFooter'));
    }

    public function about()
    {
        $showFooter = false;
        $page = ['title'=>'About Page','theme'=>'light','data'=>'ABOUT PAGE EXAMPLE DATA'];
        return view('pages.about',compact('page','showFooter'));
    }

    public function contact()
    {
        $showFooter = true;
        $page = ['title'=>'Contact Page','theme'=>'light','data'=>'CONTACT PAGE EXAMPLE DATA'];
        return view('pages.contact',compact('page','showFooter'));
    }
}
