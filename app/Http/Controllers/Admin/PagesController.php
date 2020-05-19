<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Requests\WorkWithPage;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    
    public function __construct() {
        $this->middleware('admin');
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdminOrEditor()) {
            $pages = Page::paginate(5);

        }else {
            $pages = Auth::user()->pages()->paginate(5);
        }
        $viewParams = ['pages'=>$pages];
             
        return view('admin.pages.index',$viewParams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
        return view('admin.pages.create')->with(['model'=>new Page()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkWithPage $request)
    {
        Auth::user()->pages()->save(
                new Page ($request->only([
            'title',
            'url',
            'content'
            ])));
        return redirect()->route('page')->with('status','The page has been created');
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        if(Auth::user()->cant('update',$page)) {
            return redirect()->route('page');
        }
        
        
        return view('admin.pages.edit',['model'=>$page]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(WorkWithPage $request, Page $page)
    {
        if(Auth::user()->cant('update',$page)) {
            return redirect()->route('page');
        }
        
        
        $page->fill($request->only([
            'title',
            'url',
            'content'
            ]));
        $page->save();
        
        return redirect()->route('page')->with('status','The page has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if(Auth::user()->cant('delete',$page)) {
            return redirect()->route('page');
        }

        $page->delete();
        
        return redirect()->route('page')->with('status','The page was deleted');
    }
}
