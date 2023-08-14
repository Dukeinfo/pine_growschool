<div>
    <div class="page-content">
        <div class="container-fluid">

          
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Restore Contact </h4>
                        </div>
                        <div class="card-body">
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Logo</th>
                                 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->address }}</td>
                                            <td>
                                                @if ($contact->logo)
                                                    <img src="{{ asset('storage/' . $contact->logo) }}" alt="Logo" width="50">
                                                @endif
                                            </td>
                               
                                            <td>
                                               
                                                <button wire:click="restore({{ $contact->id }})" class="btn btn-sm btn-danger">Restore</button>
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
