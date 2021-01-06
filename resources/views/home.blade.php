@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <h2>Hello, {{ auth()->user()->name }}</h2>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @isset($hobbies)
                            @if($hobbies->count() > 0)
                                <h3>Your hobbies: </h3>
                            @endif
                            <ul class="list-group">
                                @foreach($hobbies as $hobby)
                                    <li class="list-group-item">
                                        <a title="Show Details"
                                           href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                        @auth
                                            <div class="float-right">
                                                <a class="btn btn-sm btn-primary ml-2"
                                                   title="Edit Details"
                                                   href="/hobby/{{ $hobby->id }}/edit"><i
                                                        class="fas fa-edit"></i>Edit
                                                    Hobby</a>
                                                <form style="display: inline"
                                                      action="/hobby/{{ $hobby->id }}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit"
                                                           class="btn btn-sm btn-outline-danger"
                                                           type="submit"
                                                           value="Delete"
                                                    >
                                                </form>
                                            </div>
                                        @endauth
                                        <span
                                            class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
                                        <br>
                                        @foreach($hobby->tags as $tag)
                                            <a href="/hobby/tag/{{ $tag->id }}"><span
                                                    class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ul>
                        @endisset
                        <a href="/hobby/create"
                           class="btn btn-success btn-sm mt-3"><i
                                class="fas fa-plus-circle"></i> Create new hobby</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
