<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Post;
use Livewire\Component;

class PostPage extends Component
{
    public $post;
    public function render()
    {
        return view('livewire.pages.portal.post-page');
    }

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
    }
}
