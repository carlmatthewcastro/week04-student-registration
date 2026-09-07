# Application Architecture

## Request Flow
A typical registration request follows this sequence:

1. A user opens the form in the browser.
2. The browser submits the request to the Laravel route.
3. The controller receives the request payload.
4. Validation checks the submitted values and uploaded file.
5. The application stores the image in the configured public storage path.
6. The Student model creates a new database record.
7. A success message is returned to the user.
8. The user can view the saved profile in the application.

## Core Responsibilities
- Route: identifies the incoming HTTP action
- Controller: coordinates the business logic
- Validation layer: ensures input quality and correctness
- Model: maps data to the database
- View: displays the form, errors, and student data
- Storage: manages uploaded profile pictures

## Why It Matters
Separating responsibilities keeps the project maintainable and easier to scale. Each layer is responsible for one concern, which simplifies future feature development and debugging.
