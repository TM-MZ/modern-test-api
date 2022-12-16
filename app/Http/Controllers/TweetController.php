<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    //メッセージの取得
    public function index()
    {
        $items = Tweet::all();
        return response()->json([
            'data' => $items
        ],200);
    }
    //メッセージ追加
    public function store(Request $request)
    {
            $item = Tweet::create($request->all());
            if($item){
                return response()->json([
                    'data'=>$item,
                ],201);
            }else{
                return response()->json([
                    'message'=>'Not found'
                ],404);
            }
    }
    //メッセージの削除
    public function destroy(Tweet $tweet)
    {
            $item = Tweet::where('id',$tweet->id)->delete();
            if($item){
                return response()->json([
                    'message'=>'Deleted successfully'
                ],200);
            }else{
                return response()->json([
                    'message'=>'Not found'
                ],404);
            }
    }
}
