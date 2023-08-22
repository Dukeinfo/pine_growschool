<div>
    <div class="page-content">
        <div class="container-fluid">

          
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Restore Social Apps </h4>
                        </div>
                        <div class="card-body">
                        
                            <h2>Social Apps List</h2>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Logo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($socialApps as $socialApp)
                                        <tr>
                                            <td>{{ $socialApp->name }}</td>
                                            <td><a href="{{ $socialApp->link }}" target="_blank">{{ $socialApp->link }}</a></td>
                                            <td>
                                                @if ($socialApp->logo)
                                                    <img src="{{ asset('storage/' . $socialApp->logo) }}" alt="Logo" width="50">
                                                @endif
                                            </td>
                                            <td>
                                        
                                                <button wire:click="restore({{ $socialApp->id }})" class="btn btn-sm btn-danger">Restore</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            
        </div>
        <!-- container-fluid -->
    </div>
   
</div>
</div>