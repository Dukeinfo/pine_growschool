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
                    <h5 class="subTitle">School Calendar</h5>
                    <h2 class="secTitle">School Event</h2>
                   
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>Date</th>
                                    <th>Event</th>
                                </tr>
                            </thead>
                            <tbody>
       @if (count($events) >0 )
       @php
       $srno=1;
       @endphp
       @foreach($events as $event)
                                <tr>
                                    <td>{{ $event->date  ?? '' }}</td>
                                    <td>{{ $event->event  ?? '' }}</td>
                                   
                                </tr>
       @php $srno++; @endphp                        
       @endforeach
       @endif                           
                               
                            </tbody>
                        </table>
                    </div>
                  
                </div>
            </div>
        </div>
    </section>
    <!-- End: Section -->

</div>
