<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    use HasFactory;

    protected $table = "donations";

    // public function saveDonation($request)
    // {
    //     // Retrieve the form data
    //     $donationType = $request->input('donationType');
    //     $cardNumber = $request->input('cardnumber');
    //     $cardholderName = $request->input('cardholder');
    //     $cvv = $request->input('cvv');
    //     $expirationDate = $request->input('expiration');
    //     $amount = $request->input('amount');

    //     // Perform the necessary calculations
    //     $donation = Donations::where('donationType', $donationType)->first();
    //     $donatedMoney = $donation->donatedMoney + $amount;
    //     $remainingDonationMoney = $donation->neededDonationMoney - $donatedMoney;
    //     $achievedTimes = floor($donatedMoney / $donation->neededDonationMoney);
    //     $stock = $donation->stock + $achievedTimes;
        
    //     // Update the donation information in the database
    //     $donation->donatedMoney = $donatedMoney;
    //     $donation->remainingDonationMoney = $remainingDonationMoney;
    //     $donation->achievedTimes = $achievedTimes;
    //     $donation->stock = $stock;
    //     $donation->save();

    //     // Redirect back to the home page or show a success message
    //     return redirect('/')->with('success', 'Donation submitted successfully.');
    // }
}