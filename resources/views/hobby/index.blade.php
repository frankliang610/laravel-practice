@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                    @isset($filter)
                        Filter Hobbies by <span style="font-size: medium;" class="badge badge-{{ $filter->style }}">{{ $filter->name }}</span>
                        <span class="float-right"><a href="/hobby">Back to Hobbies</a></span>
                    @else
                        {{ __('All Hobbies') }}
                    @endisset
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($hobbies as $hobby)
                                <li class="list-group-item">
                                    <a title="Show Details"
                                       href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                    <span class="mx-3">Posted by: <a
                                            href="/user/{{ $hobby->user->id }}">{{ $hobby->user->name }}</a> ( {{$hobby->user->hobbies->count()}} hobbies )</span>
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
                                    <span class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
                                    <br>
                                    @foreach($hobby->tags as $tag)
                                        <a href="/hobby/tag/{{ $tag->id }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="mt-3 float-right">
                    {{ $hobbies->links() }}
                </div>
                @auth
                    <div class="mt-2">
                        <a href="/hobby/create" class="btn btn-success btn-sm">
                            <i class="fas fa-lus-circle"></i>
                            Create new hobby
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
