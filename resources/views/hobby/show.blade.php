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
                        @if($hobby->tags->count() > 0)
                            <b>Attached Tags: </b> (Click to detach)
                            <p>
                                @foreach($hobby->tags as $tag)
                                    <a href="/hobby/{{ $hobby->id }}/tag/{{ $tag->id }}/detach"><span
                                            class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                @endforeach
                            </p>
                        @endif

                        @if($available_tags->count() > 0)
                            <b>Available Tags: </b> (Click to attach)
                            <p>
                                @foreach($available_tags as $tag)
                                    <a href="/hobby/{{ $hobby->id }}/tag/{{ $tag->id }}/attach"><span
                                            class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                @endforeach
                            </p>
                        @endif
                    </div>
                </div>
{{--                <div class="mt-2">--}}
{{--                    <a href="{{ URL::previous() }}"--}}
{{--                       class="btn btn-primary btn-sm">--}}
{{--                        <i class="fas fa-arrow-circle-up"></i>--}}
{{--                        Back to Overview--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection

