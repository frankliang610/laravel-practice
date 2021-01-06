@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ $user->name }}</div>

                    <div class="card-body">
                        <b>My Motto: <br>{{ $user->motto }}</b>
                        <p class="mt-2"><b>About Me:</b> <br>{{ $user->about_me }}</p>

                        @if($user->hobbies->count() > 0)
                            <h5 class="ml-4">Hobbies of {{ $user->name }}</h5>
                            <ul class="list-group">
                                @foreach($user->hobbies as $hobby)
                                    <li class="list-group-item">
                                        <a title="Show Details"
                                           href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                        <br>
                                        @foreach($hobby->tags as $tag)
                                            <a href="/hobby/tag/{{ $tag->id }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>{{ $user->name }} has not created any hobbies yet</p>
                        @endif
                    </div>


                </div>
                <div class="mt-2">
                    <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-circle-up"></i>
                        Back to Overview
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

