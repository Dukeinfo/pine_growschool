<div>
    
    <div class="page-content">
        <div class="container-fluid">

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Restore Coachings</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th> Image</th>
                                            <th> Title</th>
                                            <th> Description</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if(isset($records) && count($records)>0 )                      
                                         @foreach ($records as  $record)	
                                        <tr>
                                            <td>@php 
                                                $thumb = !empty($record->image) ? getThumbnail($record->thumbnail)  : url('admin_assets/images/no-img.jpg');
                                                @endphp                
                                            <img src="{{$thumb}}" alt="" class="border" width="100" height="70"></td>
                                           

                                            <td>{!!$record->title ?str_limit($record->title, $limit=100 ) : '' !!}</td>

                                           <td>{!!$record->description ?str_limit($record->description, $limit=200 ) : '' !!}</td>

                                        
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
