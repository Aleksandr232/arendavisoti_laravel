<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use Spatie\Sitemap\SitemapGenerator;

class UpdateSitemap extends Command
{
    protected $signature = 'sitemap:update';

    protected $description = 'Update the sitemap';

    public function handle()
    {
        SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap updated successfully');
    }
}
