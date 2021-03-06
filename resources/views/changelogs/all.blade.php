@extends('layouts.app')

@section('hero')
<div class="jumbotron">
    <div class="container">
        <h2>
            Changelogs
            <small>
                <a href="{{ route('showChangelogs') }}">Changelogs</a>
                @if ($platform)
                    <i class="fal fa-fw fa-angle-right"></i>
                    <a href="{{ route('showChangelogs', $platform) }}">{{ getPlatformById($platform) }}</a>
                @endif
                @if ($build)
                    <i class="fal fa-fw fa-angle-right"></i>
                    <a href="{{ route('showChangelogs', [$platform, $build]) }}">{{ $build }}</a>
                @endif
            </small>
        </h2>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-2">
        <a class="btn btn-primary btn-block" href="{{ route('createChangelogs') }}"><i class="fal fa-fw fa-plus"></i> Add changelog</a>
        <div class="list-group list-group-changelogs mt-3">
            <a href="{{ URL::to('changelog/0') }}" class="list-group-item {{ $platform == '0' ? 'active' : ''}}">Generic</a>
            <a href="{{ URL::to('changelog/1') }}" class="list-group-item {{ $platform == '1' ? 'active' : ''}}">PC</a>
            <a href="{{ URL::to('changelog/2') }}" class="list-group-item {{ $platform == '2' ? 'active' : ''}}">Mobile</a>
            <a href="{{ URL::to('changelog/3') }}" class="list-group-item {{ $platform == '3' ? 'active' : ''}}">Xbox</a>
            <a href="{{ URL::to('changelog/4') }}" class="list-group-item {{ $platform == '4' ? 'active' : ''}}">Server</a>
            <a href="{{ URL::to('changelog/5') }}" class="list-group-item {{ $platform == '5' ? 'active' : ''}}">Holographic</a>
            <a href="{{ URL::to('changelog/6') }}" class="list-group-item {{ $platform == '6' ? 'active' : ''}}">IoT</a>
            <a href="{{ URL::to('changelog/7') }}" class="list-group-item {{ $platform == '7' ? 'active' : ''}}">Team</a>
            <a href="{{ URL::to('changelog/8') }}" class="list-group-item {{ $platform == '8' ? 'active' : ''}}">ISO</a>
            <a href="{{ URL::to('changelog/9') }}" class="list-group-item {{ $platform == '9' ? 'active' : ''}}">SDK</a>
        </div>
    </div>
    <div class="col-10">
        <div class="list-group list-group-changelogs">
            @foreach ($changelogs as $changelog)
                <a href="{{ route('editChangelog', [$changelog->id]) }}" class="list-group-item">
                    {{ $changelog->build }}.{{ $changelog->delta }} &middot; {{ getPlatformById($changelog->platform) }}
                </a>
            @endforeach
        </div>
        
        {{ $changelogs->links() }}
    </div>
</div>
@endsection