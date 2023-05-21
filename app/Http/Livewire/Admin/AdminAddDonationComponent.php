<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Donations;
use App\Models\Provinces;
use App\Models\ProvinceNeeds;
use Carbon\Carbon;

class AdminAddDonationComponent extends Component
{
    use WithFileUploads;

    public $donationType;
    public $neededDonationMoney;
    public $donatedMoney;
    public $stock;
    public $image;

    public function addDonation()
    {
        $donations = new Donations();
        $donations->donationType = $this->donationType;
        $donations->neededDonationMoney = $this->neededDonationMoney;
        $donations->donatedMoney = $this->donatedMoney;
        $donations->stock = $this->stock;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs($imageName);
        $donations->image = $imageName;
        $donations->save();
        session()->flash('message','Donation type added successfully!');
    }

    public $provinceName;

    public function addProvince()
    {
        $provinces = new Provinces();
        $provinces->provinceName = $this->provinceName;
        $provinces->save();
        session()->flash('message','Donation type added successfully!');
    }

    public $amount;

    public function addDemand()
    {
        $province_needs = new ProvinceNeeds();
        $province_needs->provinceName = $this->provinceName;
        $province_needs->donationType = $this->donationType;
        $province_needs->amount = $this->amount;
        $province_needs->state = "Waiting";
        $province_needs->save();
        session()->flash('message','Donation type added successfully!');
    }


    public function render()
    {
        $donations = Donations::all();
        $provinces = Provinces::all();

        return view('livewire.admin.admin-add-donation-component',['donations'=> $donations],['provinces'=> $provinces])->layout('layouts.base');
    }
}
