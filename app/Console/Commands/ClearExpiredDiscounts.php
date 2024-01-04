<?php

   namespace App\Console\Commands;

   use Illuminate\Console\Command;
   use App\Models\Discounts;

   class ClearExpiredDiscounts extends Command
   {
       protected $signature = 'discounts:clear-expired';
       protected $description = 'Clear expired discounts';

       public function handle()
       {
           Discounts::where('created_at', '<=', now()->subHour())->delete();
           $this->info('Expired discounts cleared successfully!');
       }
   }
