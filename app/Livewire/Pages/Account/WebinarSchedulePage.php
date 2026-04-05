<?php

namespace App\Livewire\Pages\Account;

use App\Models\Webinar;
use Livewire\Component;
use Carbon\Carbon;

class WebinarSchedulePage extends Component
{
    public $showModal = false;
    public $selectedWebinar = null;
    public $webinars = [];
    public $calendarDays = [];
    public $timeSlots = ['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'];
    public $currentStartDate;
    public $minDate;
    public $maxDate;

    public function mount()
    {
        $this->loadWebinars();
        $this->initializeCalendar();
    }

    protected function loadWebinars()
    {
        $this->webinars = Webinar::orderBy('date', 'asc')
            ->orderBy('time_start', 'asc')
            ->get()
            ->keyBy('id');

        $this->minDate = $this->webinars->min('date');
        $this->maxDate = $this->webinars->max('date');
    }

    protected function initializeCalendar()
    {
        $this->currentStartDate = Carbon::parse($this->minDate)->startOfWeek();
        $this->generateCalendarDays();
    }

    protected function generateCalendarDays()
    {
        $startDate = $this->currentStartDate->copy();
        $endDate = $startDate->copy()->addDays(4);

        // Русские названия месяцев
        $months = [
            'January' => 'января', 'February' => 'февраля', 'March' => 'марта',
            'April' => 'апреля', 'May' => 'мая', 'June' => 'июня',
            'July' => 'июля', 'August' => 'августа', 'September' => 'сентября',
            'October' => 'октября', 'November' => 'ноября', 'December' => 'декабря'
        ];

        $this->calendarDays = [];
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $englishMonth = $date->format('F');
            $russianMonth = $months[$englishMonth] ?? $englishMonth;

            $this->calendarDays[] = [
                'date' => $date->format('Y-m-d'),
                'day' => $date->format('j'),
                'month' => $englishMonth,
                'formatted' => $date->format('j') . ' ' . $russianMonth,
            ];
        }

    }

    public function previousWeek()
    {
        $this->currentStartDate =  Carbon::parse($this->minDate);
        $this->generateCalendarDays();
    }

    public function nextWeek()
    {
        $this->currentStartDate = Carbon::parse($this->currentStartDate)->copy()->addDays(7);
        $this->generateCalendarDays();
    }

    public function openWebinarModal($webinarId)
    {
        $this->selectedWebinar = $this->webinars->find($webinarId);
        if ($this->selectedWebinar) {
            $this->showModal = true;
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedWebinar = null;
    }

    public function getWebinarsForDate($date)
    {
        return $this->webinars->filter(function ($webinar) use ($date) {
            return $webinar->date->format('Y-m-d') === $date;
        });
    }

    public function getWebinarForTimeSlot($date, $timeSlot)
    {
        return $this->webinars->first(function ($webinar) use ($date, $timeSlot) {
            $webinarDate = $webinar->date->format('Y-m-d');
            $webinarTime = Carbon::parse($webinar->time_start)->format('H:i');
            return $webinarDate === $date && $webinarTime === $timeSlot;
        });
    }

    public function render()
    {
        return view('livewire.pages.account.webinar-schedule-page')->layout('layouts.account');
    }
}
