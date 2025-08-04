@extends('layouts.app')
@section('title', 'Role Management')

@section('content')
<div class="container">
    <h4 class="mb-3">Role Management</h4>
    <button class="btn btn-success mb-3" onclick="openCreateModal()">+ Add Role</button>

    <table class="table table-bordered" id="roleTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form id="roleForm">
      <input type="hidden" name="role_id" id="role_id">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Role Form</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" id="name" class="form-control" required>
          </div>
          <div class="form-group">
              <label>Description</label>
              <textarea name="description" id="description" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
let table;

$(function () {
    table = $('#roleTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("roles.index") }}',
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ]
    });

    $('#roleForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route("roles.store") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function () {
                $('#roleModal').modal('hide');
                table.ajax.reload();
                $('#roleForm')[0].reset();
            }
        });
    });
});

function openCreateModal() {
    $('#roleForm')[0].reset();
    $('#role_id').val('');
    $('#roleModal').modal('show');
}

function editRole(id) {
    $.get("{{ url('roles') }}/" + id + "/edit", function (data) {
        $('#role_id').val(data.id);
        $('#name').val(data.name);
        $('#description').val(data.description);
        $('#roleModal').modal('show');
    });
}

function deleteRole(id) {
    if (confirm('Are you sure to delete this role?')) {
        $.ajax({
            url: "{{ url('roles') }}/" + id,
            method: 'DELETE',
            data: {_token: '{{ csrf_token() }}'},
            success: function () {
                table.ajax.reload();
            }
        });
    }
}
</script>
@endpush
