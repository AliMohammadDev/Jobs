<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // $tags = Tag::factory(3)->create();
    // Job::factory(20)->hasAttached($tags)
    // ->create(new Sequence([
    //   'featured' => false,
    //   'schedule' => 'Full Time'
    // ], [
    //   'featured' => true,
    //   'schedule' => 'Part Time'
    // ]));

    $employer = Employer::first();

    $jobs = [
      [
        'title' => 'Full Stack Developer',
        'salary' => '$85,000 - $100,000 / year',
        'location' => 'New York, USA',
        'schedule' => 'Full Time',
        'url' => 'https://techcorp.com/jobs/full-stack-developer',
        'image' => 'jobs/full-stack.jpg',
        'tags' => 'javascript,laravel,vuejs,mysql',
        'featured' => '1',
      ],
      [
        'title' => 'Backend Developer (Laravel)',
        'salary' => '$75,000 - $90,000 / year',
        'location' => 'Remote',
        'schedule' => 'Full Time',
        'url' => 'https://devhub.io/jobs/backend-laravel',
        'image' => 'jobs/backend-developer.jpeg',
        'tags' => 'php,laravel,api,docker',
        'featured' => '1',

      ],
      [
        'title' => 'Frontend Engineer (React)',
        'salary' => '$70,000 - $85,000 / year',
        'location' => 'Austin, Texas',
        'schedule' => 'Full Time',
        'url' => 'https://pixelstudio.com/careers/frontend-engineer',
        'image' => 'jobs/react-developer.jpeg',
        'tags' => 'react,javascript,html,css',
        'featured' => '1',
      ],
      [
        'title' => 'Junior PHP Developer',
        'salary' => '$50,000 - $60,000 / year',
        'location' => 'Toronto, Canada',
        'schedule' => 'Full Time',
        'url' => 'https://webcraft.ca/jobs/junior-php-developer',
        'image' => 'jobs/php-developer.jpeg',
        'tags' => 'php,mysql,bootstrap,laravel',
        'featured' => '1',
      ],
      [
        'title' => 'Mobile App Developer (Flutter)',
        'salary' => '$80,000 / year',
        'location' => 'Berlin, Germany',
        'schedule' => 'Full Time',
        'url' => 'https://appify.io/jobs/flutter-developer',
        'image' => 'jobs/flutter-developer.jpg',
        'tags' => 'flutter,dart,firebase,android',
        'featured' => '1',
      ],
      [
        'title' => 'Part-Time WordPress Developer',
        'salary' => '$30 / hour',
        'location' => 'Remote',
        'schedule' => 'Part Time',
        'url' => 'https://creativeflow.net/jobs/wordpress-developer',
        'image' => 'jobs/WordPress-Developers.png',
        'tags' => 'wordpress,php,html,css',
        'featured' => '1',
      ],



      [
        'title' => 'DevOps Engineer',
        'salary' => '$95,000 – $115,000 / year',
        'location' => 'San Francisco, USA',
        'schedule' => 'Full Time',
        'url' => 'https://cloudsync.io/jobs/devops-engineer',
        'tags' => 'aws, docker, kubernetes, ci/cd',
        'image' => 'jobs/devsops.png',
      ],
      [
        'title' => 'Software QA Engineer',
        'salary' => '$65,000 – $80,000 / year',
        'location' => 'Remote',
        'schedule' => 'Full Time',
        'url' => 'https://testgenius.com/careers/qa-engineer',
        'tags' => 'testing, selenium, phpunit, quality-assurance',
        'image' => 'jobs/Software-QA-Engineer.png',
      ],
      [
        'title' => 'Data Analyst (Python)',
        'salary' => '$70,000 – $90,000 / year',
        'location' => 'London, UK',
        'schedule' => 'Full Time',
        'url' => 'https://datascope.ai/jobs/data-analyst',
        'tags' => 'python, pandas, sql, data-visualization',
        'image' => 'jobs/Python-for-data-analysis.jpg',
      ],
      [
        'title' => 'UI/UX Designer',
        'salary' => '$60,000 – $75,000 / year',
        'location' => 'Barcelona, Spain',
        'schedule' => 'Full Time',
        'url' => 'https://creativelab.design/jobs/uiux-designer',
        'tags' => 'figma, ux, ui, prototyping',
        'image' => 'jobs/ui-ux-Designer.jpeg',
      ],
      [
        'title' => 'Cybersecurity Specialist',
        'salary' => '$100,000 – $130,000 / year',
        'location' => 'Washington DC, USA',
        'schedule' => 'Full Time',
        'url' => 'https://securetech.com/jobs/cybersecurity-specialist',
        'tags' => 'security, network, encryption, firewall',
        'image' => 'jobs/Cybersecurity-Specialist.jpeg',
      ],
      [
        'title' => 'AI Engineer (Pytorch)',
        'salary' => '$110,000 – $140,000 / year',
        'location' => 'Tokyo, Japan',
        'schedule' => 'Full Time',
        'url' => 'https://neuralworks.jp/careers/ai-engineer',
        'tags' => 'machine-learning, python, pytorch, deep-learning',
        'image' => 'jobs/AI-Engineer-(Pytorch).png',
      ],
    ];

    foreach ($jobs as $jobData) {
      $job = $employer->jobs()->create([
        'title' => $jobData['title'],
        'salary' => $jobData['salary'],
        'location' => $jobData['location'],
        'schedule' => $jobData['schedule'],
        'url' => $jobData['url'],
        'image' => $jobData['image'],
        'featured' => false,
      ]);

      // Attach tags
      $tags = array_map('trim', explode(',', $jobData['tags']));
      foreach ($tags as $tagName) {
        $tag = Tag::firstOrCreate(['name' => $tagName]);
        $job->tags()->attach($tag);
      }
    }
  }
}