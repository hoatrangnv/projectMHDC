<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use Carbon\Carbon;
use App\Models\ChatMessages;
use App\Models\User;
use DB;
use App\Helpers\Commons;



class PushNotiRepeat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat:pushrepeat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Push repeat notification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ChatMessages::pushNotiRepeatConversation();
    }
}
