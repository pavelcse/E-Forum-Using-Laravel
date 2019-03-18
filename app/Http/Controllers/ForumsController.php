<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;
use Auth;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{


    public function index()
    {
        //$discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
        switch (request('filter')) {
            case 'me':
               $result = Discussion::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(3);
                break;

            case 'solved':
                $answered = array();
                foreach(Discussion::all() as $d){
                    if($d->hasBestAnswer()){
                        array_push($answered, $d);
                    }
                }
                $result = new Paginator($answered, 3);
                break;

            case 'unsolved':
                $unanswered = array();
                foreach(Discussion::all() as $d){
                    if(!$d->hasBestAnswer()){
                        array_push($unanswered, $d);
                    }
                }
                $result = new Paginator($unanswered, 3);
                break;
            
            default:
                $result = Discussion::orderBy('created_at', 'desc')->paginate(3);
                break;
        }
        return view('forum')->with('discussions', $result);
    }

    public function channel($slug)
    {
        $channel = Channel::where('slug', $slug)->first();

        return view('channel')->with('discussions', $channel->discussions()->paginate(5));
    }
}
