import {React,useState,useEffect} from 'react'
import '../Css/addSupplier.css'


function AddSupplier() {
  
  //state variables for supplier details
  const [SupplierName, setSupplierName] = useState(null);
  const [ContactPerson, setContactPerson] = useState(null);
  const [ContactNumber, setContactNumber] = useState(null);

  //state variables for product details
  const [productName, setProductName] = useState(null);
  const [productPrice, setProductPrice] = useState(null);
  const [imageSrc, setImageSrc] = useState(null);

  //state variable for products array
  const [products, setProducts] = useState([]);

  //state variable for sending to server (form data)
  const [supplier, setSupplier] = useState(null);

  useEffect(() => {
    console.log(supplier);
  },[supplier]);

  //function to handle image upload and display
  const handleImageUpload = (event) => {
    const file = event.target.files[0];

    if (file) {
      // Convert the selected image to a data URL
      const reader = new FileReader();
      reader.onloadend = () => {
        setImageSrc(reader.result);
      };
      reader.readAsDataURL(file);
    }

  }

  //function to handle add product button click
  const handleButtonClick = () => {
    if(productName && productPrice){
      let newProduct = {
        ProductName: productName,
        ProductPrice: productPrice,
        ProductImage: imageSrc
      };

      // Create a new array by spreading the previous products and adding the new product
      setProducts((prevProducts) => [...prevProducts, newProduct]);

      // Reset the product name and price
      setProductName(null);
      setProductPrice(null);
    }
  };

  //function to handle add supplier button click
  const handleAddSupplier = () => {
    
    setSupplier({
      supplierName: SupplierName,
      contactPerson: ContactPerson,
      contactNumber: ContactNumber,
      products: products
    })
    
  };
  
  return (
    <div className='main'>
      <div className='addsupplier-main'>

        <h1>Add Supplier Details</h1>
        <div className='supplier-details'>

          <div className='supplier-fields'>
            <p>Supplier Name:</p>
            <input type='text' placeholder='Enter Supplier Name' onChange={(e)=>setSupplierName(e.target.value)} />
          </div>

          <div className='supplier-fields'>
            <p>Contact person:</p>
            <input type='text' placeholder='Enter contact person name' onChange={(e)=>setContactPerson(e.target.value)} />
          </div>

          <div className='supplier-fields'>
            <p>Contact number:</p>
            <input type='text' placeholder='Enter Supplier Phone' onChange={(e)=>setContactNumber(e.target.value)}/>
          </div>

          <div>
            <h2>Add products</h2>
            <div className='add-product'>
              <div className='product-details'>
                <p>Product name:</p>
                <input type='text' placeholder='Enter product name' value={productName} onChange={(e)=>setProductName(e.target.value)}/>
              </div>
              <div className='product-details'>
                <p>Product price:</p>
                <input type='number' min={1} placeholder='Enter product price' value={productPrice} onChange={(e)=>setProductPrice(e.target.value)}/>
              </div>
              <div className='product-details'>
                <p>Product image:</p>
                <input type='file' placeholder='Enter product quantity' onChange={(e)=>handleImageUpload(e)}/>
              </div>
              <div><button className='product-add-button' onClick={()=>{handleButtonClick()}}>Add Product</button></div>
            </div>
          </div>

          <div className='display-products'>
            {
            products.map((product) => (
              <div className='product-row' key={product}>
                <div className='product-image'><img src={product.ProductImage} alt="" className='product-image-div'/></div>
                <div className='product-name'>{product.ProductName}</div>
                <div className='product-price'>{product.ProductPrice}</div>
                <div className='product-remove'><button>Remove</button></div>
              </div>
              ))
            }
          </div>  
        </div>
        
        <div><button className='product-add-button' onClick={()=>{handleAddSupplier()}}>Add supplier</button></div>

      </div>

    </div>
  )
}

export default AddSupplier
