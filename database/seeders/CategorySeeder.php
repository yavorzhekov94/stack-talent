<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Frontend Development',
            'Backend Development',
            'Full Stack Development',
            'Mobile App Development',
            'DevOps & Cloud Engineering',
            'Data Science & Machine Learning',
            'Artificial Intelligence',
            'UI/UX Design',
            'Product Management',
            'Project Management (Agile/Scrum)',
            'QA & Test Automation',
            'Cybersecurity',
            'Blockchain & Web3',
            'Game Development',
            'AR/VR Development',
            'Embedded Systems & IoT',
            'IT Support & System Administration',
            'Tech Writing & Documentation',
            'Database Administration',
            'Network Engineering',
        ];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name)
            ]);
        }
    }
}
