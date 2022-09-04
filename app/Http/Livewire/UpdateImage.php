<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Livewire\Component;

class UpdateImage extends Component
{ 
    use WithFileUploads;
    public $photo;
    public function render()
    {
        return view('livewire.update-image');
    }

    public function upload()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
 
        $this->photo->store('User_image');

    }
}
