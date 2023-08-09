
<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Contact Manage  </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Contact Manage </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title"> Contact Manage </h4>
                        </div>

                        
                        <div class="card-body">
                            <h4><strong>Name:</strong>  {!! $this->name ?? '' !!}</h4>

                            <p><strong>Message:</strong> {!! $this->message ?? '' !!}</p>

                           
                            <pre><strong>Created At:</strong> <br> {{Carbon\Carbon::parse($this->created_at)->diffForHumans() ?? ''}} </pre>
                            <a href="{{ route('contact_entries') }}">Back to Entries</a>
                         
                          
                    
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
          
         
            <!-- end row -->


            
        </div>
        <!-- container-fluid -->
    </div>
   
</div>
