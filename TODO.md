# TODO List for Borrow and Return API Controller

## Completed Tasks

-   [x] Create BorrowController with borrowBook and returnBook methods
-   [x] Add routes for borrowing and returning books in api.php
-   [x] Implement borrowBook method with validation and borrow record creation
-   [x] Implement returnBook method with validation and return transaction creation
-   [x] Add authentication middleware to borrow and return routes
-   [x] Update BookChild status to 'borrowed' when borrowing and 'available' when returning

## Pending Tasks

-   [ ] Test the API endpoints to ensure they work correctly
-   [ ] Add any additional validation or business logic as needed
-   [ ] Update documentation if required

## Unit Tests Created

-   [x] AuthControllerTest: Tests for login, logout, and validation
-   [x] HomeControllerTest: Tests for index and show methods
-   [x] BorrowControllerTest: Tests for borrowBook and returnBook methods

## Notes

-   Borrow period is set to 14 days by default, can be adjusted
-   Fine calculation logic may need to be implemented based on return date
-   Ensure proper error handling and user feedback
