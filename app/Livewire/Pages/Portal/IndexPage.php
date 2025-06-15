<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Speaker;
use Livewire\Component;

class IndexPage extends Component
{
    public $topics = [
        [
            'title' => 'Природа будущим поколениям:',
            'description' => 'переработка отходов и ликвидация накопленного вреда в Арктике'
        ],
        [
            'title' => 'Экологические технологии',
            'description' => 'Экологические технологии городов будущего (в том числе Арктического региона)'
        ],
        [
            'title' => 'Научная магия:',
            'description' => 'Научная магия: новая энергетика и материалы будущего'
        ],
        [
            'title' => 'Арктика за гранью фантастики:',
            'description' => 'Научная магия: новая энергетика и материалы будущего'
        ],
        [
            'title' => 'Экологическая трансформация',
            'description' => 'промышленности в Арктическом регионе'
        ],
        [
            'title' => 'Управление климатом:',
            'description' => 'как управлять климатом, не снижая темпов промышленного роста.'
        ],
    ];

    public $speakers;

    public function render()
    {
        return view('livewire.pages.portal.index-page');
    }

    public function mount()
    {
        $this->speakers = Speaker::with('media')->take(5)->get();
    }
}
