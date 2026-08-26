<?php

namespace App\Filament\Widgets;

use App\Models\Inquiry;
use App\Models\Project;
use App\Models\Quote;
use App\Models\Testimonial;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        $totalProjects = Project::count();
        $featuredProjects = Project::where('is_featured', true)->count();
        $totalInquiries = Inquiry::count();
        $totalQuotes = Quote::count();
        $publishedTestimonials = Testimonial::where('is_published', true)->count();

        return [
            Stat::make('Total Projects', $totalProjects)
                ->description($featuredProjects . ' featured projects')
                ->descriptionIcon('heroicon-m-star')
                ->color('amber'),

            Stat::make('Client Inquiries', $totalInquiries)
                ->description('Contact submissions')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('info'),

            Stat::make('Project Quotes', $totalQuotes)
                ->description('Quotation requests')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('success'),

            Stat::make('Testimonials', $publishedTestimonials)
                ->description('Published reviews')
                ->descriptionIcon('heroicon-m-chat-bubble-bottom-center-text')
                ->color('warning'),
        ];
    }
}
