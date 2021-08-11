
## Query

```SELECT COUNT(DISTINCT order.`Order_ID`) as Number_Of_Order,
  SUM(CASE 
      WHEN order.`Sales_Type` = "Normal" 
      THEN prod.`Normal_price` 
      ELSE prod.`Promotion_price`
  END) AS Total_Sales_Amount
  FROM `orders` as order
  INNER JOIN `orders_products` AS prod
  ON order.`Order_ID` =  prod.`Order_ID`;```
