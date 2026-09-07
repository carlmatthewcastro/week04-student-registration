# Database Design Notes

## Main Entity
The system centers on the `students` table, which stores the primary student record.

## Key Fields
While the full schema is defined in the migration, the main record includes:

- student ID
- personal details
- contact information
- date of birth
- academic program and year level
- address
- profile picture path
- timestamps for creation and updates

## Relationships
The project uses a simple relational model based on the student record, with supporting relationships for account and course-enrollment data where appropriate.

## Design Principle
Each record should describe one student clearly and consistently so the application can support future features such as reporting, enrollment tracking, and profile editing.
