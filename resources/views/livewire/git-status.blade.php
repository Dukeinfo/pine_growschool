<div>
    <div class="row">
<div class="col-md-4">
    <h3>Git Status</h3>
    <pre>{{ $gitStatus }}</pre>
    <button wire:click="updateGitStatus"  class="btn   btn-success">Refresh Git Status</button>

</div>
<div class="col-md-4">  <h3>Last Pull Info</h3>
    <pre>{{ $lastPullInfo }}</pre>
    <button wire:click="updateLastPullInfo" class="btn   btn-success">Refresh Last Pull Info</button></div>
<div class="col-md-4"> <h3>Last Activity</h3>
    <pre>{{ $lastActivity }}</pre>
    <button wire:click="updateLastActivity" class="btn   btn-success">Refresh Last Activity</button></div>

  
   
</div>

</div>
