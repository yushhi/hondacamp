@extends('layouts.app')

@section('content')
    <div class="row" style="padding-left: 60px; padding-right: 60px; ">
        <div class="container col-sm-8" style="border-radius: 10px; padding-top: 16px; margin-left: 16px; margin-right: 16px; background-color: white; border-style: solid; border-width: 1px; border-color: #d9d9d9">
            <h2 style="font-family: Roboto ,Arial,sans-serif"><b>{{ $post->title }}</b></h2>
            <p style="font-family: Roboto ,Arial,sans-serif">
                {{ $post->body }}
            </p>

            <!-- <div class="mb-5">
                <comments-list></comments-list>
            </div> -->

            <div style="overflow: auto; white-space: nowrap;">
                @comments(['model' => $post])
            </div>
        </div>
    </div>
@endsection
