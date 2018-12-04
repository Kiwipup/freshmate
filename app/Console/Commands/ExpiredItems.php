<?php

namespace App\Console\Commands;

use App\User;
use App\Inventory;
use DB;
use Illuminate\Console\Command;
use Carbon\Carbon;

class ExpiredItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:items';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily check for items that are expired, notification if expired items exist';

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
      $items = Inventory::all();
      foreach($items as $item){
          if($item->expiration_date->isToday()){
            $item->is_expired = true;
            $item->save();
          }
      }
    }
}
