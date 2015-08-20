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
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-6 col-sm-offset-2">
            <select id="role" name="role" class="form-control">
              @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-default btn-sm" href="#" data-toggle="modal" data-target="#tambahModal">
            Tambah</a>
          </div>
        </div>
      </div>
      <hr>
      <div class="panel panel-default role-panel">
        <table class="table">
          <tr>
            <th>Role Name</th>
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
                <select name="select-participant" id="select-participant" class="form-control">
                  @foreach($perms as $perm)
                    <option value="{{$perm['id']}}">
                      {{$perm['name']}}
                    </option>
                  @endforeach
                </select>
                <button type="button" class="btn btn-info" id="btn-participant">Tambah</button>
                <button type="button" class="btn btn-primary" id="btn-all-participant">Select All</button>
                <button type="button" class="btn btn-danger" id="btn-none-participant">Unselect All</button>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="btn-checkbox text-center col-md-offset-1 col-md-10">
              @foreach($perms as $perm)
                <button type="button" class="btn btn-default" title="remove" value="{{$perm['id']}}">
                  <input type="checkbox" name="perms[]" value="{{$perm['id']}}">{{$perm['name']}}
                  <small class="glyphicon glyphicon-remove"></small>
                </button>
              @endforeach
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
@endsection

@section('js')
<script>
  function populateRole() {
    val = $("#role").val
  }

  $("#role").change(function() {
    alert($(this).val());
  });
</script>
<script>
/*********** participant.js ***********/
  $(document).ready(function() {
    hideUnchecked();

    $("#btn-all-participant").click(function() {
      $(".btn-checkbox :checkbox").each(function() {
        check($(this));
      });
      hideUnchecked();
    });

    $("#btn-none-participant").click(function() {
      $(".btn-checkbox :checkbox").each(function() {
        uncheck($(this));
      });
      hideUnchecked();
    });

    $("#btn-participant").click(function() {
      var value = $("#select-participant option:selected").val();

      var selector = ".btn-checkbox > button";
      selector += "[value=" + value + "] :checkbox";

      check($(selector));
      hideUnchecked();
    });

    $(".btn-checkbox > button").click(function() {
      uncheck($(this).children(':checkbox'));
      hideUnchecked();
    });
  });

  function hideUnchecked() {
    var buttons = $(".btn-checkbox > button");
    buttons
    .children(":checkbox:not(:checked)")
    .each(function() {
      $(this).parent().addClass("hidden");
    });

    buttons
    .children(":checkbox:checked")
    .each(function() {
      $(this).parent().removeClass("hidden");
    });
  }

  function check(checkbox) {
    checkbox.prop("checked", "true");
  }

  function uncheck(checkbox) {
    checkbox.removeAttr("checked");
  }

  function toggleCheckbox(checkbox) {
    var now = "" + checkbox.prop("checked") + "";
    if (now != "true") {
      check(checkbox);
    } else {
      uncheck(checkbox);
    }
  }  
/*********** participant.js ***********/
</script>
@endsection