# Simple Brocery Order REST API
This REST API is built with laravel to help manage orders. It allows clients to create orders, get the list of orders, get a particular order and update the status of orders.

## Edge Case
The API handles submission of invalid quantities. It set the minimum for the quantity to be positive 1 and will automatically reject any integer below 1 during validation.
