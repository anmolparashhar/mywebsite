<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{page_title|lower|title}</title>
</head>
<body>
    <h1>{page_heading|upper|limit_chars(5)}</h1>
    <p>DOB: {date|date(Y-m-d)}</p>
    <p>DOB: {date|date(l dS F Y)}</p>
    <p>DOB: {date|date_modify(+5days)|date(l dS F Y)}</p>
    <p>Price: {price|local_currency(INR)}</p>
    <p>Price: {price|local_currency(USD)}</p>
    <p>Price: {price|local_currency(EUR)|highlight_code}</p>
    <p>Rain: {rain|round}</p>
    <p>Rain: {rain|round(ceil)}</p>
    <p>Rain: {rain|round(1)}</p>
    <h1>Custome View Filter</h1>
    <h3>Mobile: {mobile|hidenumbers(6)}</h3>
    <h4>{page_heading} contains {page_heading|countvowels} vowels.</h4>
</body>
</html>