<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
 protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap.xml for the site';

    public function handle()
    {
        SitemapGenerator::create('http://127.0.0.1:8000')
            ->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap berhasil dibuat!');
    }
}
