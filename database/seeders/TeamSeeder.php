<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'name' => 'John Doe',
                'position' => 'Project Manager',
                'bio' => 'Seorang project manager berpengalaman dengan passion di bidang teknologi dan inovasi.',
                'email' => 'john@expressoexpress.com',
                'phone' => '+62 812-3456-7890',
                'social_linkedin' => 'https://linkedin.com/in/johndoe',
                'social_instagram' => 'https://instagram.com/johndoe',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Jane Smith',
                'position' => 'Developer',
                'bio' => 'Full-stack developer yang ahli dalam berbagai teknologi modern dan framework.',
                'email' => 'jane@expressoexpress.com',
                'phone' => '+62 812-3456-7891',
                'social_linkedin' => 'https://linkedin.com/in/janesmith',
                'social_twitter' => 'https://twitter.com/janesmith',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Mike Johnson',
                'position' => 'Designer',
                'bio' => 'UI/UX designer kreatif dengan pengalaman 5+ tahun dalam desain digital.',
                'email' => 'mike@expressoexpress.com',
                'phone' => '+62 812-3456-7892',
                'social_instagram' => 'https://instagram.com/mikejohnson',
                'is_published' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}
