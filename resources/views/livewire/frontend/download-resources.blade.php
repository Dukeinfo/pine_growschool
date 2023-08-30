<div>
       <!-- BEGIN: Hero Banner Start -->
       @include('livewire.frontend.common.herobanner')

    <!-- END: Hero Banner End -->

    <!-- BEGIN: Section -->
    <section class="serviceSection02">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sidebar lft">
                        @livewire('frontend.common.quick-links')
           
                    </div>
                </div>
                <div class="col-lg-8">
                    <h5 class="subTitle">Documents to Downlaod</h5>
                    <h2 class="secTitle">Download Resources</h2>
                   
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Particulars</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
       @if (count($documents) >0 )
       @php
       $srno=1;
       @endphp
       @foreach($documents as $document)
                                <tr>
                                    <td>{{$srno}}</td>
                                    <td>{{ $document->name  ?? '' }}</td>
                                    <td><a class="" href="javascript:void(0)" wire:click="download('{{$document->file}}')">Download</a></td>
                                </tr>
       @php $srno++; @endphp                        
       @endforeach
       @endif                           
                               <!--  <tr>
                                    <td>2.</td>
                                    <td>Book List Subathu</td>
                                    <td><a class="" href="#">Download</a></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>NRI Students Form</td>
                                    <td><a class="" href="#">Download</a></td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Details of Curriculum Subathu</td>
                                    <td><a class="" href="#">Download</a></td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Admission Form</td>
                                    <td><a class="" href="#">Download</a></td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Details of Teacher Training</td>
                                    <td><a class="" href="#">Download</a></td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Transfer Certificate Subathu</td>
                                    <td><a class="" href="#">Download</a></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                  
                </div>
            </div>
        </div>
    </section>
    <!-- End: Section -->

</div>
