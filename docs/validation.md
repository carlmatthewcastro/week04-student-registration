# Validation Guide

## Validation Goals
The project uses Laravel validation to protect the application from incomplete, malformed, or duplicate information.

## Rules Used
The registration form validates the following:

- required fields for essential student information
- unique student ID and email values
- properly formatted email addresses
- numeric mobile numbers
- valid image file uploads
- accepted file types and size limits
- allowed gender values
- date correctness for date-of-birth entries

## Why Server-Side Validation Is Necessary
Browser validation helps users correct input before submission, but it is not sufficient by itself. Laravel validation runs on the server and protects the application even if a request is sent manually or manipulated.

## User Experience
Validation errors are displayed next to the affected fields so the user can correct issues quickly without re-entering all information.
