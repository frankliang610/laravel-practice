@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Hobby Details') }}</div>

                    <div class="card-body">
                        <b>{{ $hobby->name }}</b>
                        <p>{{ $hobby->description }}</p>
                        <p>
                            @foreach($hobby->tags as $tag)
                                <a href="/tag"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                            @endforeach
                        </p>
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

