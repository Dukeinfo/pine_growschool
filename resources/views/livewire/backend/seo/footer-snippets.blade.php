<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Footer Snippets</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Footer Snippets</li>
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
                            <h4 class="card-title">Schema Code</h4>
                            <p class="card-title-desc mb-0">Paste your schema code here.</p>
                        </div>
                        <div class="card-body">
                              <!--form starts-->
                            <div class="row g-3">
                                
                                <div class="col-md-12">
                                    <div class="mb-3" wire:ignore>
                                        <textarea wire:model="desc"  id="editor" cols="" rows="15" class="form-control"></textarea>
                                        <script>
                                    document.addEventListener('livewire:load', function () {
                                        CKEDITOR.replace('editor');
                                
                                        CKEDITOR.instances.editor.on('change', function () {
                                            @this.set('desc', CKEDITOR.instances.editor.getData());
                                    
                                      
                                        });
                                         Livewire.on('formSubmitted', function () {
                                         CKEDITOR.instances.editor.setData(''); // Reset CKEditor content
                                       
                                                  
                                          });
                                    });
                                </script>
                                
                                       
                                   
                                    </div>
                                     @error('desc') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <button type="submit" wire:click="addFootersnippets" class="btn btn-primary w-md">Submit</button>
                                </div>
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
