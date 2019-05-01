<?php

namespace App\Console\Commands;
use App\chat;
use Illuminate\Console\Command;
use Mail;
use Illuminate\Support\Facades\DB;
class reminder extends Command

{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remind people to send their contributions';

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
       $chat = new chat;

            $chat->group_id = "1";
            $chat->user_id = "1";
            $chat->message = "you are so damn";
           
            $chat->save();

    }
}
