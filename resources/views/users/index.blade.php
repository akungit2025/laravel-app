@extends('layouts.app')
@section('title', 'User Management')
@section('content')
<div class="mb-3">
  <button class="btn btn-success" data-toggle="modal" data-target="#userModal" onclick="openCreateModal()">+ Add User</button>
</div>
<table class="table table-bordered">
  <thead>
    <tr><th>Name</th><th>Email</th><th>Actions</th></tr>
  </thead>
  <tbody id="userTable">
    @foreach($users as $user)
    <tr id="row-{{ $user->id }}">
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
        <button class="btn btn-warning btn-sm" onclick="openEditModal({{ $user }})">Edit</button>
        <button class="btn btn-danger btn-sm" onclick="deleteUser({{ $user->id }})">Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@include('users.modal')
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function openCreateModal() {
  $('#userForm')[0].reset();
  $('#userId').val('');
  $('#userModalLabel').text('Add User');
  $('#userModal').modal('show');
}

function openEditModal(user) {
  $('#userId').val(user.id);
  $('#name').val(user.name);
  $('#email').val(user.email);
  $('#password').val('');
  $('#userModalLabel').text('Edit User');
  $('#userModal').modal('show');
}

$('#userForm').on('submit', function (e) {
  e.preventDefault();
  let id = $('#userId').val();
  let method = id ? 'PUT' : 'POST';
  let url = id ? `/users/${id}` : `/users`;

  $.ajax({
    url: url,
    type: method,
    data: $(this).serialize(),
    success: function (res) {
      Swal.fire('Success', res.message, 'success').then(() => location.reload());
    },
    error: function (err) {
      let msg = Object.values(err.responseJSON.errors).join('\n');
      Swal.fire('Error', msg, 'error');
    }
  });
});

function deleteUser(id) {
  Swal.fire({
    title: 'Are you sure?',
    text: 'User will be deleted permanently!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Yes, delete it!'
  }).then(result => {
    if (result.isConfirmed) {
      $.ajax({
        url: `/users/${id}`,
        type: 'DELETE',
        data: {_token: '{{ csrf_token() }}'},
        success: function (res) {
          Swal.fire('Deleted!', res.message, 'success').then(() => location.reload());
        }
      });
    }
  });
}
</script>
@endpush

