@extends('app')

@section('title') Role @endsection

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
  <div class="modal fade" id="tambahModal" role="dialog" aria-hidden="true">
    <form action="{{url('user/role/tambah')}}" method="post" class="form" id="form-tambah">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="tambahModalLabel">Tambah Role</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Unique Name</label>
              <input class="form-control" name="name">
            </div>
            <div class="form-group">
              <label>Description</label>
              <input class="form-control" name="description">
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
  <form action="{{url('user/role/edit')}}" method="post">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-6 col-sm-offset-2">
              <select id="role" name="role" class="form-control">
                <option value="0">-- pilih role --</option>
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-2">
              <a class="btn btn-default btn-sm" href="#" data-toggle="modal" data-target="#tambahModal">Tambah</a>
            </div>
          </div>
        </div>
        <hr>
        <div class="panel panel-default role-panel hidden">
          <table class="table">
            <tr>
              <th class="col-md-2">Role Name</th>
              <td id="role-name"></td>
            </tr>
            <tr>
              <th>Description</th>
              <td id="role-desc"></td>
            </tr>
            <tr>
              <th>Ability</th>
              <td id="role-perm">
                <div class="form-inline">
                  <select name="perms[]" id="select-perm" class="selectized" multiple>
                    @foreach($perms as $perm)
                    <option value="{{$perm['id']}}">{{$perm['name']}}</option>
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
  var roles = {!!json_encode($roles_json)!!};
  console.log(roles);

  $(document).ready(function() {
    var $select = $("#select-perm").selectize();
    var selectize = $select[0].selectize;

    function populateRole() {
      var role_id = $("#role").val();
      var role = null;

      /* find the right role by given id */
      for (key of roles) {
        if (key.id == role_id) {
          role = key;
          break;
        }
      }

      /* populate the role-panel */
      $panel = $(".role-panel");
      if (role != null) {
        $("#role-name").html(role.name);
        $("#role-desc").html(role.description);
        selectize.clear();
        for (perm of role.perms) {
          selectize.addItem(perm.id);
        }
        $panel.removeClass('hidden');
      } else {
        $panel.addClass('hidden');
      }
    }

    $("#role").change(function() {
      populateRole();
    });

    populateRole();
  });
</script>
@endsection