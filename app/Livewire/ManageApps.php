<?php

namespace App\Livewire;

use App\Models\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;

class ManageApps extends Component
{
    public $name;

    public $apps;

    public function mount(){
        $this->apps = App::where('user_id', auth()->id())->get();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required'
        ]);

        App::create([
            'name' => $this->name,
            'key' => strtolower(Str::random(20)),
            'secret' => strtolower(Str::random(20)),
            'app_id' => rand(100000, 999999),
            'user_id' => auth()->id()
        ]);

        $this->apps = App::where('user_id', auth()->id())->get();

        $this->reset('name');

        shell_exec('php ' . base_path('artisan') . ' reverb:restart');

    }

    public function delete($id)
    {
        App::find($id)->delete();

        $this->apps = App::where('user_id', auth()->id())->get();

        shell_exec('php ' . base_path('artisan') . ' reverb:restart');
    }

    public function render()
    {
        return view('livewire.manage-apps');
    }
}
