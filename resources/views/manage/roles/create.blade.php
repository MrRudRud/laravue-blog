@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create New Role</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <form action="{{route('roles.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="columns">
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h1 class="title">Role Details: </h1>
                                <div class="field">
                                    <p class="control">
                                        <label for="display_name" class="label">Name (Human Readable)</label>
                                        <input type="text" name="display_name" class="input" value="{{old('display_name')}}" id="display_name">
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                        <label for="name" class="label">Slug (Can not be Edited)</label>
                                        <input type="text"  name ="name" class="input" value="{{old('name')}}" id="name">
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                        <label for="description" class="label">Description</label>
                                        <input type="text" name="description" class="input" value="{{old('description')}}" id="description">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="box">
                    <div class="media">
                        <div class="media-content">
                            <div class="content">
                                <h2 class="title">Permissions:</h2>
                                @foreach ($permission as $permission)
                                    <div class="field">
                                        <b-checkbox v-model="permissionSelected" :native-value="{{$permission->id}}"> 
                                        {{$permission->display_name}} 
                                        <em>({{$permission->description}})</em>
                                        </b-checkbox>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="permissions" :value="permissionSelected">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="button is-success m-b-20">Create New Role</button>
        </form>

    </div>
@endsection
@section('script')
    <script>
    var app = new Vue({
        el: '#app',
        data: {
            permissionSelected: []
        }
    });
    </script>
@endsection