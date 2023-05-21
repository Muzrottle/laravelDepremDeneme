<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Donations;
use App\Models\Provinces;
use App\Models\ProvinceNeeds;
use Livewire\WithPagination;

class AdminDashboardComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function deleteDonationType($id)
    {
        $donations = Donations::find($id);
        $donations->delete();
        session()->flash('message', 'Donation has been deleted successfully!');
    }

    public function deleteProvince($id)
    {
        $provinces = Provinces::find($id);
        $provinces->delete();
        session()->flash('message', 'Province has been deleted successfully!');
    }

    public function deleteProvinceNeed($id)
    {
        $province_needs = ProvinceNeeds::find($id);
        $province_needs->delete();
        session()->flash('message', 'Province has been deleted successfully!');
    }

    public $donationType;
    public $donationStock;

    public function approveProvinceNeed($id)
    {
        $province_needs = ProvinceNeeds::find($id);
        $donationType = $province_needs->donationType;

        $donations = Donations::where('donationType', $donationType)->first();
        
        $donations->stock = $donations->stock - $province_needs->amount;
        $province_needs->state = "Approved";
        $province_needs->save();
        $donations->save();

        // Redirect back to the page or route you want to refresh
        return redirect('admin/dashboard');
    }

    public function render()
    {
        $donations = Donations::paginate(5);
        $provinces = Provinces::paginate(5);
        $province_needs = ProvinceNeeds::paginate(5);

        return view('livewire.admin.admin-dashboard-component', [
            'donations' => $donations,
            'provinces' => $provinces,
            'province_needs' => $province_needs
        ])->layout('layouts.base');
    }
}
