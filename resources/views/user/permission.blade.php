@extends('app')

@section('title') Permission @endsection

@section('content')
  <div class="modal fade" id="editModal" role="dialog" aria-hidden="true">
    <form action="{{url('user/permission/edit')}}" method="post" class="form" id="form-edit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="editModalLabel">Edit Permission</h4>
          </div>
          <div class="modal-body">
            <input class="form-control hidden" name="id" id="id-edit">
            <div class="form-group hidden">
              <label>Unique Name</label>
              <input class="form-control" id="name-edit">
            </div>
            <div class="form-group">
              <label>Display Name</label>
              <input class="form-control" name="display_name" id="display-edit">
            </div>
            <div class="form-group">
              <label>Description</label>
              <input class="form-control" name="description" id="description-edit">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="row">
    <div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">Permission</div>
        @if($perms->count() > 0)
          <table class="table table-striped table-bordered">
            <tr>
              <th>Unique Name</th>
              <th>Display Name</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
            @foreach ($perms as $perm)
              <tr>
                <td class="perm-id hidden">{{$perm->id}}</td>
                <td class="perm-name">{{$perm->name}}</td>
                <td class="perm-display">{{$perm->display_name}}</td>
                <td class="perm-description">{{$perm->description}}</td>
                <td>
                  <a class="btn btn-primary btn-sm edit-perm" title="edit" href="#" data-toggle="modal" data-target="#editModal">
                    edit
                  </a>
                </td>
              </tr>
            @endforeach
          </table>
        @else
        @endif
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
  $(".edit-perm").click(function() {
    $parent = $(this).parent().parent();
    id = $(".perm-id", $parent).html();
    name = $(".perm-name", $parent).html();
    display = $(".perm-display", $parent).html();
    description = $(".perm-description", $parent).html();

    $("#id-edit").val(id);
    // $("#name-edit").val(name);
    $("#display-edit").val(display);
    $("#description-edit").val(description);
  });
  </script>
@endsection
