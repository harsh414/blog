<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search="";
    public function render()
    {
        if(strlen($this->search)>=2) {
            $searchResult = DB::table('blogs')->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->join('users as u','blogs.user_id','=','u.id')
                ->orderBy('blogs.created_at','DESC')
                ->select('blogs.*','u.name','u.img_url')
                ->get();
            return view('livewire.search-dropdown',[
                'searchResult'=>$searchResult
            ]);
        }
        else{
            return view('livewire.search-dropdown');
        }
    }
}
