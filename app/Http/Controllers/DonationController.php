<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donations;

class DonationController extends Controller
{
    public function saveDonation(Request $request)
    {
        // Retrieve the form data
        $donationType = $request->input('donationType');
        $cardNumber = $request->input('cardnumber');
        $cardholderName = $request->input('cardholder');
        $cvv = $request->input('cvv');
        $expirationDate = $request->input('expiration');
        $amount = $request->input('amount');

        // Perform the necessary calculations
        $donation = Donations::where('donationType', $donationType)->first();
        $donatedMoney = $donation->donatedMoney + $amount;
        $achievedTimes = floor($donatedMoney / $donation->neededDonationMoney);
        $stock = $donation->stock + $achievedTimes;
        $donatedMoney = $donatedMoney % $donation->neededDonationMoney;
        
        // Update the donation information in the database
        $donation->donatedMoney = $donatedMoney;
        $donation->stock = $stock;
        $donation->save();

        // Redirect back to the home page or show a success message
        return redirect('/')->with('success', 'Donation submitted successfully.');
    }
}
