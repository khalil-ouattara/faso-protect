<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WebsitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('websites')->insert([
            [
                'id' => Str::uuid()->toString(),
                'user_id' => DB::table('users')->where('name', 'Agent')->first()->id,
                'status_id' => DB::table('status')->where('name', 'En cours')->first()->id,
                'company_name' => 'Example Company',
                'domain_name' => 'example.com',
                'registrar' => 'GoDaddy',
                'whois_server' => 'whois.example.com',
                'registrant_name' => 'John Doe',
                'registrant_email' => 'john@example.com',
                'registrant_phone' => '+1234567890',
                'registrant_country' => 'USA',
                'creation_date' => now()->subYears(2),
                'expiration_date' => now()->addYear(),
                'updated_date' => now(),
                'raw_data' => json_encode(['key' => 'value']), // Exemple de données brutes
                'trackers_detected' => 'None',
                'cookies_detected' => 'Minimal cookies detected',
                'non_compliant_cookies' => 'None',
                'forms_detected' => 'Contact Form',
                'legal_mentions_present' => 'Yes',
                'cookie_consent_button' => 'Present',
                'privacy_policy_link_valid' => 'Valid',
                'recommendations' => 'Ensure periodic reviews.',
            ],
        ]);

    }
}
