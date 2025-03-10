<?php

namespace Database\Seeders;

use App\Models\Fees;
use App\Models\PaymentSubmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $fees = Fees::where('status', 'pending')->where('balance', '>', 0)->get();

        foreach ($fees as $fee) {
            // $amountToPay = fake()->randomFloat(2, 1, $fee->balance);
            $payFullChance = 30;

            if (fake()->numberBetween(1, 100) <= $payFullChance) {
                $amountToPay = $fee->balance;
            } else {
                $amountToPay = fake()->randomFloat(2, 1, $fee->balance * 0.9);
            }

            PaymentSubmission::create([
                "student_id" => $fee['student_id'],
                "fees_id" => $fee['id'],
                "screenshot_path" => "images/payments_submission/fake_gcash_receipt.jpg",
                "amount_paid" => $amountToPay,
                "status" => "pending",
                "reviewed_by" => null,
                "reviewed_at" => null,
                "remarks" => null,
            ]);

            // $fee['balance'] -= $amountToPay;

            // if ($fee['balance'] <= 0) {
            //     $fee['balance'] = 0;
            //     $fee['status'] = 'paid';
            // }

            $fee->save();
        }

        // mag add ko here og mga payments
    }
}
