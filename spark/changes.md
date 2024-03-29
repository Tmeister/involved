# Change Log

## Version 1.0.10

- Fix relative date formatting.

## Version 1.0.9

- Fix various bugs.

## Version 1.0.8

- Fix typo in class name.
- Constrain Vue packages tighter.

## Version 1.0.7

- Stringify a few forms before handing them to vue-resource.

## Version 1.0.6

- Fix calculation of revenue when using subscription quantities.
- Return result of interactions from base controller.

## Version 1.0.5

- Fix HTTP calls with new `vue-resource` updates.

## Version 1.0.4

- Use `SPARK_PATH` in `UpdateInstallation` class.
- Update Blade layout to use same global script logic as Vue layout.
- Fix `TokenGuard` to allow API authentication to work with `actingAs` during testing.
- Fix responsiveness of update subscription screen.

## Version 1.0.3

- Fix closing tag of metrics Vue component.

## Version 1.0.2

- Lower case e-mail before calling Gravatar.
- Import Closure into `CallsInteractions`.

## Version 1.0.1

- Check for existing invoice by ID before storing local database record.

## Version 1.0.0

- Fix infinite redirect when using `Spark::promotion`.

## Version 0.1.19

- Fix CSRF verification bug in two-factor authentication when "remember me" is checked.

## Version 0.1.18

- Fix JWT import for some PHP versions.

## Version 0.1.17

- Fix token regression from last release.

## Version 0.1.16

- Convert transient API tokens to use JWT instead of storing in database.
- Remove unnecessary methods in TokenRepository.
- Reset "Assign All Abilities" button after creating an API token.

**After installing this update you should `composer update` and verify that the `firebase/php-jwt` package has been installed for your application.**

## Version 0.1.15

- Fix double encryption of API token cookies in TokenController.

## Version 0.1.14

- Fix file uploads in Firefox.

## Version 0.1.13

- Fix links to team settings pages.

## Version 0.1.12

- Check that maximum team rule is enforced when downgrading plans.

## Version 0.1.11

- Don't force `subscribe` middleware out of the box on `HomeController`.

## Version 0.1.10

- Fix link back to team overview page.

## Version 0.1.9

- Fix missing variable in team eligibility check.

## Version 0.1.8

- Fix typo on extra billing information entry screen.

## Version 0.1.7

- Throttle password reset attempts.

## Version 0.1.6

- Fix bug in subscription page redirection in JavaScript interceptors.

## Version 0.1.5

- Publish new views from Spark if they haven't been published yet.

## Version 0.1.4

- Fix coupon display bug.

## Version 0.1.3

- Added short-cuts for a few common swaps.
- Added more robust plan eligibility checking.

## Version 0.1.2

- Included `RedirectIfAuthenticated` in installation stubs.
- Added `spark:version` Artisan command.
- Added "excluding VAT" notice to all subscription screens.
- Automatically calculate VAT for customers when applicable.
- Display tax amount and total price with tax on check-out situations.
- Clean up Vue fragment components.

