# Assessment Task: Translation Management System

## Overview
This assessment task focuses on developing and testing a translation management feature in a Laravel application. The feature involves creating and managing translations via API endpoints. Additionally, authentication and proper testing are incorporated to ensure functionality.

## Features
- Add new translations with a unique translation key.
- Associate translations with specific locales (e.g., `en`, `fr`).
- Attach metadata (e.g., tags) to translations.
- Test the functionality using Laravel's built-in testing framework.

## Requirements
- Laravel Framework (version 11).
- PHPUnit for testing.
- Database setup (e.g., MySQL).
- Passport Authentication middleware for secure API usage.

## Setup Instructions
### 1. Clone the Repository
```bash
# Clone the repository
git clone <repository_url>
cd <repository_directory>
```

### 2. Install Dependencies
Run the following command to install all Laravel dependencies:
```bash
composer install
```

### 3. Configure Environment Variables
Create or update the `.env` file with the necessary configurations:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=trans_management
DB_USERNAME=root
DB_PASSWORD=



### 4. Run Database Migrations
Run the migrations to set up the necessary database tables:
```bash
php artisan migrate
```

### 5. Seed Data (Optional)
If you have seeders, run the database seeder:
```bash
php artisan db:seed
```
#after run the seeder run the command
php artisan queue:work
### 6. Run the Application
Start the Laravel development server:
```bash
php artisan serve
```
Access the application at [http://localhost:8000]

## API Endpoints
### Create a Translation
**POST** `/translations`

#### Request Payload
```json
{
    "translate_key": "Test Key",
    "local": "en",
    "content": "Test",
    "tags": ["web", "mobile"]
}
```

#### Response
- **200**: Successfully created translation.
- **201**: Failed to create translation.

### Authentication (If Required)
- Use Bearer Token in the `Authorization` header for secured endpoints.

## Running Tests
This project includes a feature test for creating translations.

### Test Command
Run the following command to execute the test:
```bash
php artisan test --filter=testCreateTranslation
```

### Sample Test Code
The `TranslationSeederTest` includes the following test method:

```php
public function testCreateTranslation(): void
{
    $data = [
        'translate_key' => 'Test Key',
        'local' => 'en',
        'content' => 'Test',
        'tags' => ['web', 'mobile'],
    ];

    // Simulating an authenticated request
    $user = \App\Models\User::factory()->create();
    $this->actingAs($user);

    $response = $this->post('/translations', $data);

    $response->assertStatus(200); // Change to 201 if appropriate
}
```

## Key Files
### 1. **`app/Interfaces/TranslateInterface.php`**
Defines the contract for translation operations.

### 2. **`app/Http/Controllers/TranslationController.php`**
Handles translation-related API requests.

### 3. **`tests/Feature/TranslationSeederTest.php`**
Contains test cases for the translation feature.
