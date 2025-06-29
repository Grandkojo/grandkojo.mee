# Test Suite Documentation

This test suite uses PHP 8 attributes format and PHPUnit 11.5.3 for testing the Laravel portfolio application.

## Test Structure

### Unit Tests (`tests/Unit/`)
- **Models**: Test model attributes, casts, relationships, and custom methods
- **Mail**: Test mail class functionality and data handling
- **Filesystem**: Test custom filesystem adapters

### Feature Tests (`tests/Feature/`)
- **Controllers**: Test HTTP endpoints, validation, and responses
- **Admin Controllers**: Test admin panel functionality with authentication
- **Authentication**: Test login/logout functionality

## Test Files Created

### Unit Tests
- `tests/Unit/Models/UserTest.php` - User model functionality
- `tests/Unit/Models/ProjectTest.php` - Project model functionality
- `tests/Unit/Models/SkillTest.php` - Skill model functionality
- `tests/Unit/Models/ResumeItemTest.php` - ResumeItem model functionality
- `tests/Unit/Mail/ContactFormTest.php` - Contact form email functionality
- `tests/Unit/Mail/ContactConfirmationTest.php` - Contact confirmation email functionality
- `tests/Unit/Filesystem/GoogleCloudStorageAdapterTest.php` - Google Cloud Storage adapter functionality

### Feature Tests
- `tests/Feature/PortfolioControllerTest.php` - Portfolio page and contact form functionality
- `tests/Feature/AuthControllerTest.php` - Authentication functionality
- `tests/Feature/Admin/ProjectControllerTest.php` - Admin project management
- `tests/Feature/Admin/SkillControllerTest.php` - Admin skill management
- `tests/Feature/Admin/ResumeItemControllerTest.php` - Admin resume item management

## Running Tests

### Run All Tests
```bash
composer test
```

### Run Specific Test Suite
```bash
# Run only unit tests
./vendor/bin/phpunit --testsuite Unit

# Run only feature tests
./vendor/bin/phpunit --testsuite Feature
```

### Run Specific Test File
```bash
./vendor/bin/phpunit tests/Unit/Models/UserTest.php
```

### Run Specific Test Method
```bash
./vendor/bin/phpunit --filter test_the_application_returns_a_successful_response
```

### Run Tests with Coverage
```bash
./vendor/bin/phpunit --coverage-html coverage/
```

## Test Attributes Used

All tests use PHP 8 attributes format:

```php
#[Test]
public function it_can_create_a_user(): void
{
    // Test implementation
}
```

## Key Testing Features

### Database Testing
- Uses `RefreshDatabase` trait for clean database state
- Tests model creation, updates, and deletion
- Validates database constraints and relationships

### HTTP Testing
- Tests controller responses and redirects
- Validates form submissions and AJAX requests
- Tests authentication and authorization

### File Upload Testing
- Tests image upload functionality
- Validates file storage and cleanup
- Uses `Storage::fake()` for isolated testing

### Mail Testing
- Tests email sending functionality
- Validates email content and recipients
- Uses `Mail::fake()` for isolated testing

### Validation Testing
- Tests form validation rules
- Validates error messages and responses
- Tests both regular and AJAX validation

## Test Data

Tests use Laravel factories for generating test data:
- `User::factory()`
- `Project::factory()`
- `Skill::factory()`
- `ResumeItem::factory()`

## Environment Configuration

Tests run with the following environment variables:
- `APP_ENV=testing`
- `DB_CONNECTION=sqlite`
- `DB_DATABASE=:memory:`
- `MAIL_MAILER=array`
- `CACHE_DRIVER=array`
- `SESSION_DRIVER=array`

## Best Practices

1. **Test Naming**: Use descriptive test method names that explain what is being tested
2. **Arrange-Act-Assert**: Structure tests with clear sections for setup, action, and verification
3. **Isolation**: Each test should be independent and not rely on other tests
4. **Coverage**: Aim for comprehensive coverage of all business logic
5. **Maintainability**: Keep tests simple and focused on single responsibilities

## Continuous Integration

The test suite is configured to run in CI/CD pipelines and will:
- Run all tests automatically
- Generate coverage reports
- Fail builds on test failures
- Cache test results for faster subsequent runs 