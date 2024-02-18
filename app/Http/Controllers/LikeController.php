<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $photo_id = $request->input('foto_id');
        $like = Like::where('foto_id', $photo_id)->first();

        if (!$like) {
            $like = new Like;
            $like->photo_id = $photo_id;
            $like->like_count =0;
            $like->save();
        } else {
            $like->like_count +=0;
            $like->save();
        }

        return response()->json(['message' => 'Like telah disimpan.']);
    }
}
