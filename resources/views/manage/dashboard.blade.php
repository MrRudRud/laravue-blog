@extends('layouts.manage')

@section('content')
<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">{{ $user->name}}</h1>
            <h1 class="title">{{ $user->created_at->toFormattedDateString()}}</h1>
            {{-- <h1 class="title">{{ $timezone }}</h1> --}}
            <h2>@{{ time }}</h2>
            <h2>@{{ offset }}</h2>
            <h2>@{{ timeuser }}</h2>
        </div>
    </div>
</div>

    
@endsection
@section('script')
<script>
var offset = new Date().getTimezoneOffset();
var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
var timeuser = Intl.DateTimeFormat().resolvedOptions();

var app = new Vue({
    el: '#app',
    data: {
        time: timezone,
        offset: this.offset,
        timeuser: this.timeuser
    },
    // created: function() {
    //        return this.time();
    // },
    //  methods: {
    //     time: function(time) {
    //         var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    //         return this.timezone;
    //     } 
    // }
});
</script>
@endsection