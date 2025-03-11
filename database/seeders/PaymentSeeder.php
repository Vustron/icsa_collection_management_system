<?php

namespace Database\Seeders;

use App\Models\Fees;
use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fees = Fees::where("status", "pending")
            ->where("balance", ">", 0)
            ->get();

        foreach ($fees as $fee) {
            $amountToPay = fake()->randomFloat(2, 1, $fee->balance);

            Payment::create([
                "fees_id" => $fee->id,
                "amount_paid" => $amountToPay,
                "payment_method" => "cash",
                "received_by" => 2,
            ]);

            $fee->balance -= $amountToPay;

            if ($fee->balance <= 0) {
                $fee->balance = 0;
                $fee->status = "paid";
            }

            $fee->save();
        }
    }
}
