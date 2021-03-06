@extends('layouts.manage')

@section('content')
<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">Edit Users</h1>
        </div>
    </div>
    <hr class="m-t-0">

        <div class="columns">
            <div class="column">
                <form action="{{route('users.update', $user->id)}}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control">
                            <input type="text" class="input" name="name" id="name" value="{{$user->name}}">
                        </p>
                    </div>
                    <div class="field">
                        <label for="email" class="label">Email</label>
                        <p class="control">
                        <input type="text" class="input" name="email" id="email" value="{{$user->email}}">
                        </p>
                    </div>
                    <div class="field">
                        <label for="password" class="label">Password</label>
                       
                            <div class="field">
                                <b-radio v-model="password_options" native-value="keep" name="password_options">Do Not Change Password</b-radio>
                            </div>
                            <div class="field">
                                <b-radio v-model="password_options" native-value="auto" name="password_options">Auto-Generate New Password</b-radio>
                            </div>
                            <div class="field">
                                <b-radio v-model="password_options" native-value="manual" name="password_options">Manually Set New Password</b-radio>
                                <p class="control m-t-10">
                                    <input type="text" class="input" name="password" id="password" v-if="password_options == 'manual'" placeholder="Manually give a password to this user">
                                </p>
                            </div>
                        {{-- input ini yang akan menjadi acuan value roles yg diupdate --}}
                        <input type="hidden" name="roles" :value="rolesSelected"> 
                    </div>
                    <hr class="m-t-30">
                    <div class="columns">
                        <div class="column">
                            <button class="button is-success  m-b-20" style="width:250px;">Edit User</button>
                        </div>
                    </div>
            </div>
            <div class="column">
                <label for="roles" class="label">Roles:</label>
                @foreach ($roles as $role)
                <div class="field">
                    <b-checkbox 
                        :native-value="{{$role->id}}" 
                        v-model="rolesSelected">{{$role->display_name}}
                    </b-checkbox>
                </div>
                @endforeach
            </div>
            {{-- <h2>@{{rolesValue}}</h2> --}}
        </div>
        
</form>
</div>

@endsection
@section('script')
    <script>
    var app = new Vue({
        el: '#app',
        data: {
            password_options: 'keep',
            rolesSelected: {!! $user->roles->pluck('id') !!},
            rolesValue: {!! $user->roles->pluck('name') !!}
        }
    });
    </script>
@endsection