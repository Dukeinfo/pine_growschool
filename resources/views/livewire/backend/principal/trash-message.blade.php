<div>
    
    <div class="page-content">
        <div class="container-fluid">

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Restore Messages</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Headmaster Name</th>
                                            <th>Heading</th>
                                            <th>Punch Line</th>
                                            <th>Message</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if(isset($records) && count($records)>0 )                      
                                         @foreach ($records as  $record)	
                                        <tr>
                                            <td>{{$record->name ?? '' }}</td>
                                             <td>{{$record->heading ?? '' }}</td>
                                              <td>{{$record->punch_line ?? '' }}</td>s
                                           <td>{!!$record->message ?? '' !!}</td>
                                        
                                            <td>{{$record->sort_id ?? '' }}</td>
                                            <td><span class="badge badge-soft-success">{{$record->status ?? '' }}</span></td>
                                            <td>
                                                
                                                <a href="javascript:void(0)" class="text-danger me-2" title="Restore" wire:click="restore({{ $record->id }})"><i class="fa fa-times fa-fw fa-lg"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                      @else
                                 <tr>
                                 <td colspan="4"> Record Not Found</td>
                                
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
        <!-- container-fluid <-->	</-->
    </div>
</div>
