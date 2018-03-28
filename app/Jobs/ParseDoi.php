<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Auth;

class ParseDoi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 60;
    public $doi;
    public $request;
    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($doi, $request, $user)
    {
        $this->doi = $doi;
        $this->request = $request;
        $this->user = Auth::user($user);
        \Log::info($this->user->id);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $doi = $this->doi;
        // $user = $this->user;
        $doiRequest = new Client(['base_uri' => 'https://api.crossref.org/works/']);
        $result = $doiRequest->request('GET', $doi)->getBody();
        $result = json_decode($result, true);
        $result = $result['message']['container-title']['0'];
        // \Log::debug($user->id);
    }
}
