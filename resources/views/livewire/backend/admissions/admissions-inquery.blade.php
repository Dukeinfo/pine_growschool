<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage Admissions Inquery</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Admissions Inquery</li>
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
                            <h4 class="card-title">Admissions Inquery</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Student name</th>
                                            <th>Date of Birth </th>
                                            <th>Admission Sought</th>
                                            <th>Studying In</th>
                                            <th>Father's Phone No.</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                                        @if(isset($records) && count($records)>0 )                      
                                                            @foreach ($records as  $record)                    
                                                                            <tr>
                                                                                <td>{{$record->name ?? '' }}</td>
                                                                                <td>  {{$record->date_of_birth ?? '' }}  </td>
                                                                                 <td>{{$record->admission_sought ?? '' }}</td>
                                                                                 <td>{{$record->studying_in ?? '' }}</td>
                                                                                  <td>{{$record->father_phone ?? '' }}</td>
                                            <td>
                                                <a href="javascript:void(0)" class="text-danger me-2" title="Delete"><i class="fa fa-times fa-fw fa-lg" wire:click="delete({{ $record->id }})"></i></a>
                                            </td>
                                        </tr>
                                        
                                 @endforeach
                                      @else
                                 <tr>
                                 <td colspan="5"> Record Not Found</td>
                                
                                 </tr>
                                 @endif                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            
        </div>
        <!-- container-fluid -->
    </div>
</div>
