<div>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Restore Contact  </h4>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
          
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                 
                        <div class="card-body">
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entries as $entry)
                                    <tr>
                                        <td>{{ $entry->name }}</td>
                                        <td>{{ $entry->email }}</td>
                                        <td>{{ $entry->phone }}</td>
                                        <td>{{ $entry->subject }}</td>
                                     
                                        <td>{{ $entry->created_at }}</td>
                                        <td>
                                           
                                            <button wire:click="restore({{ $entry->id }})" class="btn btn-sm btn-danger">Restore</button>
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
