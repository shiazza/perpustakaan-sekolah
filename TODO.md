# TODO: Implement Approval System for Borrow and Return

-   [x] Modify borrowBook method in BorrowController.php: Change borrow status from 'borrowed' to 'waiting'
-   [x] Remove bookChild status update in borrowBook method to keep book available
-   [x] Modify returnBook method in BorrowController.php: Change borrow status from 'returned' to 'waiting'
-   [x] Remove bookChild status update in returnBook method to keep book available until approved
-   [x] Add approveBorrow method in web BorrowController to approve borrow requests
-   [x] Add approveReturn method in web BorrowController to approve return requests
