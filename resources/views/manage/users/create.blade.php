@extends('layouts.manage')

@section('content')
<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">Create New Users</h1>
        </div>
    </div>
    <hr class="m-t-0">

        <div class="columns">
            <div class="column">
                <form action="{{route('users.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control">
                            <input type="text" class="input" name="name" id="name" required>
                        </p>
                    </div>
                    <div class="field">
                        <label for="email" class="label">Email</label>
                        <p class="control">
                            <input type="text" class="input" name="email" id="email" required>
                        </p>
                    </div>
                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <p class="control">
                            <input type="text" class="input" name="password" id="password" v-if="!auto_password" placeholder="Manually give a password to this user">
                        <b-checkbox name="auto_generate" class="m-t-10"  v-model="auto_password" >Auto Generate Password</b-checkbox>
                        </p>
                    </div>

                    <button class="button is-success">Create User</button>
                </form>
            </div>
        </div>
</div>
@endsection
@section('script')
    <script>
    var app = new Vue({
        el: '#app',
        data: {
            auto_password: true
        }
    });
    </script>
@endsection