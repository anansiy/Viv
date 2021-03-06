@extends('layouts.app')

@section('hero')
<div class="jumbotron tabs">
    <div class="container">
        <h2 class="mb-4"><i class="fab fa-fw fa-windows"></i> Windows 10</h2>
        <ul class="nav nav-tabs">
            @foreach ($platforms as $platform)
                <li class="nav-item">
                    <a class="nav-link {{ $platform->platform == $cur_platform ? 'active' : '' }}" href="{{ URL::to('build/'.$cur_build.'/'.$platform->platform) }}">
                        {{ getPlatformById($platform->platform) }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="changelog">
            @foreach ($notes as $delta => $info)
                <h2 class="date-heading text-accent">{{ $meta->major }}.{{ $meta->minor }}.{{ $meta->build }}.{{ $delta }}</h2>
                <div class="date-box">
                    @php
                        $first = false;
                    @endphp
                    @foreach ($info['rings'] as $ring => $release)
                        @if ($first)
                            <i class="fal fa-fw fa-angle-right"></i>
                        @endif
                        <span class="label {{ getRingClassById($ring) }}">{{ $release->date->format('j M \'y') }}</span>
                        @if (!$first)
                            @php
                                $first = true;
                            @endphp
                        @endif
                    @endforeach
                </div>

                @if (array_key_exists('changelog', $info))
                    {!! $parsedown->text($info['changelog']) !!}
                @else
                    <h4>No changelog yet</h4>
                @endif
            @endforeach
        </div>
    </div>
    <div class="col-lg-4">
        <div class="timeline">
            @foreach ($timeline as $date => $builds)
                <div class="date-heading">{{ $date }}</div>
                <div></div>
                @foreach ($builds as $build => $deltas)
                    @foreach ($deltas as $delta => $platforms)
                        @foreach ($platforms as $platform => $rings)
                            <div class="timeline-row">
                                <a class="row" href="{{ route('showRelease', $build, $platform) }}">
                                    <div class="col-6 col-md-5 build"><img src="{{ asset('img/platform/'.getPlatformImage($platform)) }}" class="img-platform img-jump" alt="{{ getPlatformById($platform) }}" />{{ $build }}.{{ $delta }}</div>
                                    <div class="col-6 col-md-7 ring">
                                        @foreach ($rings as $ring)
                                            <span class="label {{ $ring->class }}">{{ $ring->flight }}</span>
                                        @endforeach
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('modals')

@endsection