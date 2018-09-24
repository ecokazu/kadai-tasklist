<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasklist;
use App\User;

class tasklistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ログイン認証判定
        
         if (\Auth::check()) {
            $user = \Auth::user();
            $tasklists = $user->tasklists()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasklists' => $tasklists,
            ];
            //$data += $this->counts($user);
            
       
        return view('tasklists.index',$data);
         }else{
             
             return view('welcome');
         }
        
        
    }

    public function alltask()
    {
            $tasklists = Tasklist::paginate(5);
            $users = User::all();
            $data = [
                'user' => $users,
                'tasklists' => $tasklists,
            ];
            
            
            if (\Auth::check()) {
            $authuser = \Auth::user();
            
            $data +=['authuser' =>$authuser->id,
            ];
            }
            
            
            
            return view('tasklists.alltask',$data);
    }
     
     
     
     
    public function create()
    {
        //
        $tasklist =new Tasklist; 
        
        return view('tasklists.create',['tasklist'=>$tasklist]);
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
        $this->validate($request,['status' => 'required|max:10',
        'content'=>'required|max:191',
        'title'=>'required|max:191',
        ]);
        
      
        
        $request->user()->tasklists()->create([
            'status'=> $request->status,
            'content' => $request->content,
            'title'=>$request->title,
            ]);
        
        return redirect('/');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    
        $tasklist = Tasklist::find($id);
     
              if (empty($task)) {
            return redirect('/');
            }
            
            if (\Auth::id() === $tasklist->user_id) {
    
                return view('tasklists.show', [
                    'tasklist' => $tasklist,
                ]);
            
            }
        
        return redirect('/');
        
        
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
        $tasklist=Tasklist::find($id);
        
        if (\Auth::id() === $tasklist->user_id) {

            return view('tasklists.edit',[
            'tasklist'=>$tasklist,]);
            
        
        }
        return redirect('/');
        
        
        
        
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
        //バリエーション
        $this->validate($request,['status' => 'required|max:10',
        'content'=>'required|max:191',]);
        
        $tasklist=Tasklist::find($id);
        $tasklist->title = $request->title;
        $tasklist->status = $request->status;
        $tasklist->content = $request->content;
        $tasklist->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tasklist=Tasklist::find($id);
        
        if (\Auth::id() === $tasklist->user_id) {

            $tasklist->delete();

            
        
        }
        
                return redirect('/');
    }
}
