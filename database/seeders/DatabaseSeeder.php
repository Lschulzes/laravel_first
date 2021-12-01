<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    if (!$this->command->confirm('Do you really want to refresh the DB?', true)) return;
    $this->command->call('migrate:refresh');
    $this->command->info("Database was refreshed!");
    $this->call([
      UsersTableSeeder::class,
      BlogPostsTableSeeder::class,
      CommentsTableSeeder::class
    ]);
  }
}
