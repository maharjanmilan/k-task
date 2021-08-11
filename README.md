## Answers
Mysql query and calcuation answer is inside answers directory.

Flowchart and schema design for reward system is in the root directory. 
Php code is inside the `src` directory.

## Execution
The example code is written at `src/index.php`

In this example user buys 2 power banks with price 1.4 each. The user already has 300 reward points, so pays with reward points. 

The result can be viewed running this file from terminal as    
`$ php src/index.php`

To view it in the browser  
`$ php -S localhost:8888 src/index.php`

## Question

Your company would like to develop a reward system. The requirement is as below:
- Customers will be rewarded with Points when Sales Order is in “Complete” status.
- Every USD $1 sales amount will be rewarded with 1 point, if the sales amount is not USD, convert to the equivalent amount in USD for reward amount calculation.
- The reward amount will be credited into the customer account with the expiry date, which is 1 year later.
- Points can be used for new order payment, every 1 point equivalent to USD $0.01.

Please provide the following :
- Flowchart or UML diagram on the reward system
- Design MySQL database schema for this reward system
- PHP functions to credit user reward points after order completion
- Please note, point no. 4 should be covered at the database level. The schema should answer us how you are planning for use of the point in sales.

