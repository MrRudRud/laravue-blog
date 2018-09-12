@extends('layouts.manage')

@section('content')
<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">Create New Permission</h1>
        </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
        <div class="column">
            <form action="{{route('permissions.store')}}" method="POST">
            {{ csrf_field() }}
            {{-- <div class="block">
                <b-radio-group v-model="permissionType">
                    <b-radio name="permission_type" v-model="permissionType" native-value="basic">Basic Permission</b-radio>
                    <b-radio name="permission_type" v-model="permissionType" native-value="crud">CRUD Permission</b-radio>
                </b-radio-group>
            </div> --}}
            <b-field>
                <b-radio-button v-model="permissionType"
                    name="permission_type" 
                    native-value="basic"
                    type="is-success">
                    <span>Basic</span>
                </b-radio-button>

                <b-radio-button v-model="permissionType"
                    name="permission_type" 
                    native-value="crud" 
                    type="is-success">
                    <span>CRUD</span>
                </b-radio-button>
            </b-field>

            <div class="field" v-if="permissionType == 'basic'">
                <label for="display_name" class="label"> Name (Display Name)</label>
                <p class="control">
                    <input type="text" class="input" name="display_name" id="display_name">
                </p>
            </div>

            <div class="field" v-if="permissionType == 'basic'">
                <label for="name" class="label"> Slug</label>
                <p class="control">
                    <input type="text" class="input" name="name" id="name">
                </p>
            </div>
            <div class="field" v-if="permissionType == 'basic'">
                <label for="description" class="label"> Description</label>
                <p class="control">
                    <input type="text" class="input" name="description" id="description" placeholder="">
                </p>
            </div>

            {{-- HIdden block to CRUD --}}
            <div class="field" v-if="permissionType == 'crud'">
                <label for="resource" class="label">Resource</label>
                <p class="control">
                    <input type="text" class="input" name="resource" id="resource" v-model="resource" placeholder="The name of the resource">
                </p>
            </div>

            <div class="columns" v-if="permissionType == 'crud'">
                <div class="column">
                    <div class="field">
                        <b-checkbox native-value="create" v-model="crudSelected">Create</b-checkbox>
                    </div>
                    <div class="field">
                        <b-checkbox native-value="read" v-model="crudSelected">Read</b-checkbox>
                    </div>
                    <div class="field">
                        <b-checkbox native-value="update" v-model="crudSelected">Update</b-checkbox>
                    </div>
                    <div class="field">
                        <b-checkbox native-value="delete" v-model="crudSelected">Delete</b-checkbox>
                    </div>
                    {{-- <h2>@{{ crudSelected }}</h2> --}}
                </div>

                <input type="hidden" name="crud_selected" :value="crudSelected">
                <div class="column">
                    {{-- <h2>@{{ resource }}</h2> --}}
                    <table class="table is-narrowed" v-if="resource.length >= 3">
                        <thead>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                        </thead>
                        <tbody>
                            <tr v-for="item in crudSelected">
                                <td v-text="crudName(item)"></td>
                                <td v-text="crudSlug(item)"></td>
                                <td v-text="crudDescription(item)"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <button class="button is-success">Create Permission</button>
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
        permissionType: 'basic',
        resource: '',
        crudSelected: ['create','read','update', 'delete']
    },
    methods: {
        crudName: function(item) {
          return item.substr(0,1).toUpperCase() + item.substr(1) + " " + this.resource.substr(0,1).toUpperCase() + this.resource.substr(1);
        }
        ,
        crudSlug: function(item) {
          return item.toLowerCase() + "-" + app.resource.toLowerCase();
        },
        crudDescription: function(item) {
          return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
        }
    }
});
</script>
@endsection