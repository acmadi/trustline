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
              <th>User Name</th>
              <td id="user-name"></td>
            </tr>
            <tr>
              <th>Role</th>
              <td id="user-role">
                <div class="form-inline">
                  <select id="select-participant" class="form-control">
                    @foreach($roles as $role)
                    <option value="{{$role['id']}}" id="option{{$role['id']}}">{{$role['name']}}</option>
                    @endforeach
                  </select>
                  <button type="button" class="btn btn-info" id="btn-participant">Select</button>
                  <button type="button" class="btn btn-primary" id="btn-all-participant">Select All</button>
                  <button type="button" class="btn btn-danger" id="btn-none-participant">Unselect All</button>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <div class="btn-checkbox text-center col-md-offset-1 col-md-10">
                  @foreach($roles as $role)
                  <button type="button" class="btn btn-default" title="remove" value="{{$role['id']}}">
                    <input type="checkbox" name="roles[]" value="{{$role['id']}}">{{$role['name']}}
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
  </form>
@endsection

@section('js')
<script>
  var users = {!!json_encode($users_json)!!};
  console.log(users);

  $(document).ready(function() {
    renderParticipant();
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
        uncheckAll();
        for (role of user.roles) {
          var selector = "#option" + role.id;
          $option = $(selector);
          console.log('Autocheck from selector "' + selector + '"');
          check($option);
        }
        renderParticipant();
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
/*********** participant.js ***********/
  /* Populate the action button */
  $(document).ready(function() {
    $("#btn-all-participant").click(function() {
      checkAll();
    });

    $("#btn-none-participant").click(function() {
      uncheckAll();
    });

    $("#btn-participant").click(function() {
      var value = $("#select-participant option:selected").val();

      var selector = ".btn-checkbox > button";
      selector += "[value=" + value + "] :checkbox";

      check($(selector));
      renderParticipant();
    });

    $(".btn-checkbox > button").click(function() {
      uncheck($(this).children(':checkbox'));
      renderParticipant();
    });
  });

  /* Uncheck all checkboxes */
  function uncheckAll() {
    $(".btn-checkbox :checkbox").each(function() {
      uncheck($(this));
    });
    renderParticipant();
  }

  /* Check all checkboxes */
  function checkAll() {
    $(".btn-checkbox :checkbox").each(function() {
      check($(this));
    });
    renderParticipant();
  }

  /* After you check or uncheck the hidden
   * checkboxes via js, you must call this */
  function renderParticipant() {
    console.log('begin renderParticipant');
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
      console.log($(this).val())
    });
    console.log('finish renderParticipant');
  }

  /* Check a checkbox */
  function check(checkbox) {
    checkbox.prop("checked", "true");
    console.log('function check:');
    console.log(checkbox.val());
  }

  /* Uncheck a checkbox */
  function uncheck(checkbox) {
    checkbox.removeAttr("checked");
  }

  /* Toggle check and uncheck a checkbox */
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