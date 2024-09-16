<style>
  #image-preview {
    max-width: 100px;
    height: auto;
  }
.image-tabel {
    max-width: 50px;
    height: auto;
  }

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
</style>

<div class="container mx-auto">
    <div class="card mt-4 col col-md-12">
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
        <div class="p-4">
            <div class="d-flex justify-content-center"><h3>Edit Kontent</h3></div>
            <form action="{{ route('kontent.update', $kontents->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
              <!-- Add this line for the PUT method in case of update -->
                
                <div class="form-group">
                     <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    
                    <img id="image-preview" src="{{ asset('storage/' . $kontents->image) }}" alt="Image preview" style="display: {{ $kontents->image ? 'block' : 'none' }};" />
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title', $kontents->title) }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description">{{ old('description', $kontents->description) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<script>
  document.getElementById('image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
      const img = document.getElementById('image-preview');
      img.src = e.target.result;
      img.style.display = 'block';
    }

    if (file) {
      reader.readAsDataURL(file);
    } else {
      const img = document.getElementById('image-preview');
      img.src = '#';
      img.style.display = 'none';
    }
  });

  // Auto-hide alerts after a few seconds
  function autoHideAlert(alertId) {
    const alert = document.getElementById(alertId);
    if (alert) {
      setTimeout(() => {
        alert.classList.add('hide');
      }, 3000); // 3 seconds delay before hiding
    }
  }

  autoHideAlert('success-alert');
  autoHideAlert('error-alert');
</script>
