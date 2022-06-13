
-- Producto con mayor número de venta
SELECT T1.product_name, SUM(T0.quantity) as quantity
FROM sale_order_product as T0
LEFT JOIN products AS T1 ON T0.product_id = T1.id
GROUP BY T1.id
ORDER BY SUM(T0.quantity) DESC LIMIT 1


-- Producto con mayor stock
SELECT reference, product_name
FROM products
WHERE stock = (SELECT MAX(stock) FROM products)