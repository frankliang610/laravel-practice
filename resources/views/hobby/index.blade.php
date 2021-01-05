@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Hobbies') }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($hobbies as $hobby)
                            <li class="list-group-item">
                                <a title="Show Details" href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                <a class="btn btn-sm btn-light ml-2" title="Edit Details" href="/hobby/{{ $hobby->id }}/edit"><i class="fas fa-edit"></i>Edit Hobby</a>
                                <form class="float-right" style="display: inline" action="/hobby/{{ $hobby->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit"
                                           class="btn btn-sm btn-outline-danger"
                                           type="submit"
                                           value="Delete"
                                    >
                                </form>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-2">
                    <a href="/hobby/create" class="btn btn-success btn-sm">
                        <i class="fas fa-lus-circle"></i>
                        Create new hobby
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
