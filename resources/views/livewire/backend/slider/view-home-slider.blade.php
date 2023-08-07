<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Slider</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Slider</li>
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
                            <h4 class="card-title">Add Slider</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">

                            <form>
                            <!--form starts-->
                            <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Heading</label>
                                    <input type="text" class="form-control" id="" wire:model="heading" placeholder="Heading">
                                    @error('heading') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Sub Heading</label>

                                    

                                    <textarea  class="form-control" id="" wire:model="subheading" placeholder="Sub Heading" name="" id="" cols="10" rows="5"></textarea>
                                    @error('subheading') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Alt Tab</label>
                                    <input type="text" class="form-control" id="" wire:model="alt_tag"  placeholder="Alt Tab">
                                    @error('alt_tab') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Link</label>
                                    <input type="text" class="form-control" id="" wire:model="link"  placeholder="Link">
                                    @error('link') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Slider Image</label>
                                        <input type="file" class="form-control" id="" wire:model="image" multiple  onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                    
                                        <img src="{{asset('admin_assets/images/no-img.jpg')}}" alt=".." class="border mt-2" width="100" height="30%">

                                   
                                        @error('image.*') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control" id="" wire:model="sort" placeholder="Number" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                        @error('sort') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select wire:model="status" class="form-select">
                                            <option value="">Select</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                        @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Slider section </label>
                                        <select wire:model="name" class="form-select">
                                            <option value="">Select</option>
                                            <option value="Top">Top slider</option>
                                            <option value="Bottom">Bottom slider</option>
                                        </select>
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div> --}}
                            </div>
                                <div class="col-md-2" >
                                    <div class="mb-3" >
                                        <label class="form-label">&nbsp;</label><br>
                                        <button type="button" wire:loading.attr="disabled" wire:target="addSlider"   wire:click="addSlider" class="btn btn-primary w-md" >Submit</button>
                                    </div>
                                     <div wire:loading wire:target="addSlider">
                                        <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">

                                     </div>
                                </div>

                           
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Manage Slider</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Alt Tab</th>
                                            <th>Slider Image</th>
                                            <th>Heading</th>
                                            <th>Sub Heading</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($records) && count($records)>0 )                      
                                        @foreach ($records as  $record)
                                        <tr>
                                            <td>{{$record->alt_tab ?? '' }}</td>
                                            <td>
                                            @php
                                           
$thumb = !empty($record->image) ?  getThumbnail($record->thumbnail) : url('admin_assets/images/no-img.jpg');
@endphp                                      
<img src="{{$thumb}}" alt="" class="border" width="100" height="70">

                                                
                                            </td>
                                            <td>{{$record->heading ?? '' }}</td>
                                            <td>{{$record->subheading ?? '' }}</td>
                                            <td>{{$record->sort_id ?? '' }}</td>
                                            <td>
@if($record->status  == "Active")
        <span class="badge badge-soft-success">{{$record->status  ?? ''}}</span></td>
         @else
       <span class="badge badge-soft-danger">{{$record->status  ?? ''}}</span></td>
@endif</td>
                                            <td>
                                                <a href="{{url('/admin/edit/slider')}}/{{$record->id }}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
                                                <a href="javascript:void(0)" class="text-danger me-2" title="Delete"><i class="fa fa-times fa-fw fa-lg" wire:click="delete({{ $record->id }})"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                 <tr>
                                 <td colspan="7"> Record Not Found</td>
                                
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
