<div class="container mt-5">
    <div class="text-center mb-4 mt-5">
        <h1>Visi dan Misi</h1>
    </div>
    <div class="row">
        <!-- Visi Section -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Visi</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($visis as $data)
                            <li class="list-group-item">
                                {{ $data->text}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- Misi Section -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4>Misi</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($misis as $item)
                            <li class="list-group-item">
                                {{ $item->text}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
