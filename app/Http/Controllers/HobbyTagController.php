<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Tag;
use App\Hobby;

class HobbyTagController extends Controller
{
    public function getFilteredHobbies($tag_id)
    {
        $tag = new Tag();
        $hobbies = $tag::findOrFail($tag_id)->filteredHobbies()->paginate(10);

        $filter = $tag::find($tag_id);

        return view('hobby.index', [
            'hobbies' => $hobbies,
            'filter' => $filter
        ]);
    }

    public function attachTag($hobby_id, $tag_id)
    {
        $hobby = Hobby::find($hobby_id);

        if(Gate::denies('connect_hobby_tag', $hobby)){
            abort(403, 'Unauthorised User');
        }

        $tag = Tag::find($tag_id);
        $hobby->tags()->attach($tag_id);
        return back()->with(
            [
                'message_success' => "The Tag <br>" . $tag->name . "</b> has been attached to ". "the " . $hobby->name . ". "
            ]
        );
    }

    public function detachTag($hobby_id, $tag_id)
    {
        $hobby = Hobby::find($hobby_id);

        if(Gate::denies('connect_hobby_tag', $hobby)){
            abort(403, 'Unauthorised User');
        }

        $tag = Tag::find($tag_id);
        $hobby->tags()->detach($tag_id);
        return back()->with(
            [
                'message_success' => "The Tag <br>" . $tag->name . "</b> has been detached from ". "the " . $hobby->name . ". "
            ]
        );
    }
}
