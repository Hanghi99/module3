<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Discount Calculatort</title>
</head>
<body>
    <form action="/product" method='POST'>
        @csrf
  <h1>Product Discount Calculatort</h1>
  <p>Product Description:  <input type="text" name="product_description" placeholder="Product Description"/></p>
  <p>List Price:           <input type="text" name="list_price" placeholder="List Price"/></p>
  <p>Discount Percent:     <input type="text" name="discount_percent" placeholder="Discount Percent"/></p>
  <input type="submit" value="Count"/>
    </form>
</body>
</html>