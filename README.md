# Arctiq_Intern_Task

It is a simple react.js (frontEnd) and Laravel (backEnd) project to practice basic CRUD operations usign Laravel

## Overview

Basic fnctionalities are we can,\
    1. **Add suppliers**\
    2. **Add products to specific supplier**\
    3. **Edit supplier and product details**\
    4. **Delete suppliers and products**


## Getting Started

1. **Clone the Repository**: Start by cloning this repository to your local machine using the following command:

   ```bash
   git clone https://github.com/your-username/Arctiq_Intern_Task.git

2. **Run the server:** By using following command

     ```bash
   php artisan serve

3. **Migrate the database and add fake data:** By using following command

     ```bash
   php artisan migrate --seed

4. **To view frontend start react app:** By using following command

     ```bash
   npm start

frontEnd: http://localhost:3000 \
frontEnd: http://localhost:8000

## API End points in the server

1. view all suppliers: GET - http://localhost:8000/api/v1/suppliers
2. view all products: GET - http://localhost:8000/api/v1/products
3. view specific supplier: GET - http://localhost:8000/api/v1/suppliers/{id}
4. view specific product:GET - http://localhost:8000/api/v1/products/{id}
5. include products with suppliers:GET - http://localhost:8000/api/v1/suppliers?includeProducts=true
6. edit supplier:PATCH or PUT - http://localhost:8000/api/v1/suppliers/{id}
7. add bulk products to a supplier: POST - http://localhost:8000/api/v1/products/bulk
8. add suppliers: POST - http://localhost:8000/api/v1/suppliers
9. delete supplier: DELETE - http://localhost:8000/api/v1/suppliers/{id}
10. add products: POST - http://localhost:8000/api/v1/products
11. delete product: DELETE - http://localhost:8000/api/v1/products/{id}
