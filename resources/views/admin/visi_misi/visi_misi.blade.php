<style>
  .alert {
    position: fixed;
    top: 60px;
    right: 20px;
    z-index: 1000;
    opacity: 1;
    transition: opacity 0.5s ease-out;
  }

  .alert.hide {
    opacity: 0;
  }

  .table-container {
    margin-top: 30px;
  }

  .table th, .table td {
    text-align: center;
  }
</style>

<div class="container">
  <h2>Create Visi and Misi</h2>

  @if (session('success'))
    <div class="alert alert-success" id="success-alert">
      {{ session('success') }}
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger" id="error-alert">
      {{ session('error') }}
    </div>
  @endif

  <div class="row">
    <!-- Form for Visi -->
    <div class="col-md-6 mb-5">
      <h5>Add New Visi</h5>
      <form action="{{ route('visi.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="visi_description">Text</label>
          <textarea class="form-control" id="visi_description" name="text" rows="3" required>{{ old('text') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Visi</button>
      </form>
    </div>

    <!-- Form for Misi -->
    <div class="col-md-6">
      <h5>Add New Misi</h5>
      <form action="{{ route('misi.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="misi_description">Text</label>
          <textarea class="form-control" id="misi_description" name="text" rows="3" required>{{ old('text') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Misi</button>
      </form>
    </div>
  </div>

  <!-- Tables for Visi and Misi -->
  <div class="row table-container">
    <div class="col-md-6">
      <h4>Visi List</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($visis as $visi)
            <tr>
              <td>{{ $visi->id }}</td>
              <td>{{ $visi->text }}</td>
              <td>
                <!-- Add edit and delete actions if needed -->
                 <button type="button" class="btn btn-warning btn-sm" data-target="#editVisiModal{{ $visi->id }}" data-toggle="modal">Edit</button>
                <form  method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
       <div class="d-flex justify-content-between">
        {{ $visis->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <div class="col-md-6">
      <h4>Misi List</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($misis as $misi)
            <tr>
              <td>{{ $misi->id }}</td>
              <td>{{ $misi->text }}</td>
              <td>
                <!-- Add edit and delete actions if needed -->
                <button type="button" class="btn btn-warning btn-sm" data-target="#editMisiModal{{ $misi->id }}" data-toggle="modal">Edit</button>
                <form  method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
       
      </table>
       <div class="d-flex justify-content-between">
        {{ $misis->links('pagination::bootstrap-4') }}
        </div>
    </div>
  </div>
  <!-- Modal for Editing Visi -->
@foreach($visis as $visi)
<div class="modal fade" id="editVisiModal{{$visi->id}}" tabindex="-1" aria-labelledby="editVisiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editVisiModalLabel">Edit Visi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('visi.update', $visi->id) }}" method="POST">
        @csrf
        <!-- @method('PUT') -->
        <div class="modal-body">
          <div class="form-group">
            <label for="visi_edit_description">Text</label>
            <textarea class="form-control" id="visi_edit_description" name="text"  rows="3" required>{{$visi->text}}</textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
<!-- Modal for Editing Misi -->
  @foreach($misis as $misi)
<div class="modal fade" id="editMisiModal{{$misi->id}}" tabindex="-1" aria-labelledby="editMisiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMisiModalLabel">Edit Misi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editMisiForm" action="{{ route('misi.update', $misi->id) }}" method="POST">
        @csrf
        <!-- @method('PUT') -->
        <div class="modal-body">
          <div class="form-group">
            <label for="misi_edit_description">Text</label>
            <textarea class="form-control" id="misi_edit_description" name="text" rows="3" required>{{$misi->text}}</textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
  @endforeach
 
</div>
</div>

<!-- JavaScript for auto-hide alerts -->
<script>
  document.getElementById('success-alert')?.classList.add('hide');
  document.getElementById('error-alert')?.classList.add('hide');

  function autoHideAlert(alertId) {
    const alert = document.getElementById(alertId);
    if (alert) {
      setTimeout(() => {
        alert.classList.add('hide');
      }, 10000); // 3 seconds delay before hiding
    }
  }

  autoHideAlert('success-alert');
  autoHideAlert('error-alert');
//   function openEditVisiModal(id, text) {
//     // Set form action to update the correct Visi
//     const form = document.getElementById('editVisiForm');
//     form.action = '/admin/visi-misi/visi/' + id; // Route to your update route
//     form.method = 'PUT';

//     // Set textarea value to the current Visi text
//     document.getElementById('visi_edit_description').value = text;

//     // Show the modal
//     $('#editVisiModal').modal('show');
//   }

//   function openEditMisiModal(id, text) {
//     // Set form action to update the correct Misi
//     const form = document.getElementById('editMisiForm');
//     form.action = '/admin/visi-misi/misi/' + id; // Route to your update route
//     form.method = 'PUT';
//     // Set textarea value to the current Misi text
//     document.getElementById('misi_edit_description').value = text;

//     // Show the modal
//     $('#editMisiModal').modal('show');
//   }
 
</script>
