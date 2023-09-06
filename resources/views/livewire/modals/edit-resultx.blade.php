<div>
    <div class="modal fade @if($show === true) show @endif"
         id="myExampleModal"
         style="display: @if($show === true)
                 block
         @else
                 none
         @endif;"
         tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">RESULT</h5>
                    <button class="close"
                            type="button"
                            aria-label="Close"
                            wire:click.prevent="doClose()">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                  

          <form>
         
          
          <!-- Text input -->
          <div class="form-outline mb-4">
          <input type="number" id="form6Example3" class="form-control" wire:model="year"/>
          <label class="form-label" for="form6Example3">Year </label>
          </div>

          <!-- Text input -->
          <div class="form-outline mb-4">
          <input type="number" id="form6Example4" class="form-control" wire:model="regstu"/>
          <label class="form-label" for="form6Example4">NO. OF REGISTERED STUDENTS</label>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
          <input type="number" id="form6Example5" class="form-control" wire:model="passstu"/>
          <label class="form-label" for="form6Example5">NO. OF STUDENTS PASSED</label>
          </div>

          <!-- Number input -->
          <div class="form-outline mb-4">
          <input type="number" id="form6Example6" class="form-control" wire:model="passper"/>
          <label class="form-label" for="form6Example6">PASS PERCENTAGE</label>
          </div>

          <div class="form-outline mb-4">
          <input type="test" id="form6Example6" class="form-control" wire:model="remarks"/>
          <label class="form-label" for="form6Example6"> Remarks</label>
          </div>

       

          <!-- Submit button -->
          <button type="button" class="btn btn-primary btn-block mb-4"  wire:click.prevent="doSomething()">Save</button>
          </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary"
                            type="button"
                            wire:click.prevent="doClose()">Cancel</button>

                    
                </div>
            </div>
        </div>
    </div>
    <!-- Let's also add the backdrop / overlay here -->
    <div class="modal-backdrop fade show"
         id="backdrop"
         style="display: @if($show === true)
                 block
         @else
                 none
         @endif;"></div>
</div>