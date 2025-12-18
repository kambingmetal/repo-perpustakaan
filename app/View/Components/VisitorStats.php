<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\VisitorStatsService;

class VisitorStats extends Component
{
    public $stats;
    public $showTitle;
    public $layout;

    /**
     * Create a new component instance.
     */
    public function __construct(bool $showTitle = true, string $layout = 'default')
    {
        $this->stats = app(VisitorStatsService::class)->getStats();
        $this->showTitle = $showTitle;
        $this->layout = $layout;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.visitor-stats');
    }
}