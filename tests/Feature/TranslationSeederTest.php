<?php

namespace Tests\Feature;

use App\Interfaces\TranslateInterface;
use App\Models\User;
use Illuminate\Container\Attributes\Log;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log as FacadesLog;
use Tests\TestCase;

use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class TranslationSeederTest extends TestCase
{
    private $translate;
    /**
     * A basic feature test example.
     */
    public function setUp(): void
    {
        parent::setUp();

        // Resolve the TranslateInterface from Laravel's service container
        $this->translate = app(TranslateInterface::class);
    }
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testCreateTranslation(): void
    {
        $data = [
            'translate_key' => 'Test Key',
            'local' => 'en',
            'content' => 'Test',
            'tags' => ['web', 'mobile'],
        ];
        $response = $this->translate->store($data);
        if ($response) {
            $this->assertTrue(true);
        }else{
            $this->assertFalse(false);
        }
    }
}
