@extends('app')

@section('title') User @endsection

@section('css')
<style>
  .btn-checkbox button {
    margin-bottom: 3px;
  }

  .btn-checkbox button input[type=checkbox] {
    display: none;
  }
</style>
@endsection

@section('content')
  <div class="modal fade" id="tambahModal" user="dialog" aria-hidden="true">
    <form action="{{url('user/tambah')}}" method="post" class="form" id="form-tambah">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="tambahModalLabel">Tambah User</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Unique Name</label>
              <input class="form-control" name="name">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-success">Create</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  @if (session('alert'))
    <div class="alert alert-{{session('alert')['alert']}} alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      {{session('alert')['body']}}
    </div>
  @endif
  <form action="{{url('user/edit')}}" method="post">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-6 col-sm-offset-2">
              <select id="user" name="user" class="form-control">
                <option value="0">-- pilih user --</option>
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-2">
              <a class="btn btn-default btn-sm" href="#" data-toggle="modal" data-target="#tambahModal">Tambah</a>
            </div>
          </div>
        </div>
        <hr>
        <div class="panel panel-default user-panel hidden">
          <table class="table">
            <tr>
              <th class="col-md-2">User Name</th>
              <td id="user-name"></td>
            </tr>
            <tr>
              <th>Role</th>
              <td id="user-role">
                <div class="form-inline">
                  <select id="select-roles" name="roles[]" class="selectized" multiple>
                    @foreach($roles as $role)
                    <option value="{{$role['id']}}">{{$role['name']}}</option>
                    @endforeach
                  </select>
                </div>
              </td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" class="btn btn-success" value="Save"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </form>
@endsection

@section('js')
<script>
  var users = {!!json_encode($users_json)!!};
  console.log(users);

  $(document).ready(function() {
    var $select = $("#select-roles").selectize({
      create: true
    });
    var selectize = $select[0].selectize;

    function populateUser() {
      var user_id = $("#user").val();
      var user = null;

      /* find the right user by given id */
      for (key of users) {
        if (key.id == user_id) {
          user = key;
          break;
        }
      }

      /* populate the user-panel */
      $panel = $(".user-panel");
      if (user != null) {
        $("#user-name").html(user.name);
        selectize.clear();
        for (role of user.roles) {
          selectize.addItem(role.id)
        }
        $panel.removeClass('hidden');
      } else {
        $panel.addClass('hidden');
      }
    }

    $("#user").change(function() {
      populateUser();
    });

    populateUser();
  });
</script>
@endsection