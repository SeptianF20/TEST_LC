@extends('app')
@section("head")
@include('layouts.head')
@endsection
@section("script")
@include('layouts.script')
@endsection
@extends('layouts.app')

@section('content')
    <h1>Favorit Pencarian</h1>

    @if($pencarianFavorit->isEmpty())
        <p>Belum ada pencarian yang ditandai sebagai favorit.</p>
    @else
        <ul>
            @foreach($pencarianFavorit as $pencarian)
                <li>
                    {{ $pencarian->kata }} - {{ $pencarian->created_at->format('d-m-Y H:i:s') }}
                </li>
            @endforeach
        </ul>
    @endif
@endsection

