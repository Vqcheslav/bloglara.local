<?php
 
namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\CommentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
 
class SeederTest extends TestCase
{
    use RefreshDatabase;
 
    /**
     * Test creating 10 users, 50 posts, 250 comments.
     *
     * @return void
     */
    public function test_database_seeder()
    {
        $this->seed();

        $this->assertDatabaseCount('users', 10);
        $this->assertDatabaseCount('posts', 50);
        $this->assertDatabaseCount('comments', 250);
    }

    /**
     * Test creating a new Post, User and Comment.
     *
     * @return void
     */
    public function test_seeders()
    {
        $this->seed([
            PostSeeder::class,
            UserSeeder::class,
            CommentSeeder::class,
        ]);

        $this->assertDatabaseCount('users', 10);
        $this->assertDatabaseCount('posts', 10);
        $this->assertDatabaseCount('comments', 10);
    }

    /**
     * Test creating a new user.
     *
     * @return void
     */
    public function test_user_can_be_created_by_seeder()
    {
        $user = User::factory()->create();
 
        $this->assertModelExists($user);
    }

    /**
     * Test creating a new post.
     *
     * @return void
     */
    public function test_post_can_be_created_by_seeder()
    {
        $post = Post::factory()->create();
 
        $this->assertModelExists($post);
    }

    /**
     * Test creating a new comment.
     *
     * @return void
     */
    public function test_comment_can_be_created_by_seeder()
    {
        $comment = Comment::factory()->create();
 
        $this->assertModelExists($comment);
    }
}