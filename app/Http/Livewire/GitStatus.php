<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Artisan;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
class GitStatus extends Component
{

    public $gitStatus;
    public $lastPullInfo;
    public $lastActivity;

    public function mount()
    {
        $this->updateGitStatus();
        $this->updateLastActivity();
        $this->updateLastPullInfo();
    }

    public function updateGitStatus()
    {
        try {
            $process = new Process(['git', 'status']);
            $process->run();

            $this->gitStatus = $process->getOutput();
   
        } catch (ProcessFailedException $exception) {
            $this->gitStatus = "Error fetching Git status.";
        }
    }
    public function updateLastPullInfo()
    {
        try {
            $process = new Process(['git', 'log', '-n', '1', '--pretty=format:"%h - %an, %ar : %s"']);
            $process->run();

            $this->lastPullInfo = $process->getOutput();
 

        } catch (ProcessFailedException $exception) {
            $this->lastPullInfo = "Error fetching last pull information.";
        }
    }

    public function updateLastActivity()
    {
        // Use `git log` to retrieve the last commit or pull information.
        $lastActivity = shell_exec('git log -n 1 --pretty=format:"%h - %an, %ar : %s"');

        $this->lastActivity = $lastActivity ?: 'No activity found.';
    }
    public function render()
    {
        return view('livewire.git-status');
    }

}
