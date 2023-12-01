import {React,useEffect,useState} from 'react'
import '../Css/viewSuppliers.css'
import axios from 'axios'

function ViewSupplier() {
    
    const [suppliers,setSuppliers] = useState([])
    const [search,setSearch] = useState('')
    const [filteredSuppliers,setFilteredSuppliers] = useState([])

    useEffect(()=>{
        axios.get('http://localhost:3001/sanctum/csrf-cookie/supplier').then((response)=>{
            // setSuppliers(response.data)
            console.log(response.data)
        })
    },[suppliers])
    
  return (
    <div className='main'>
        <div className='addsupplier-main'>
            <div className='d-flex flex-row'>
                <h1>Supplier Details</h1>
                <a href="/addSupplier"><button className='product-add-button'>Add supplier</button></a>
            </div>
            <div className='suppliertable'>
                <div className='suppliers-heading'>
                    <p>Name</p>
                    <p>Contact person</p>
                    <p>Phone No</p>
                    <p></p>
                    <p></p>
                </div>
                <div className='suppliers-rows'>
                    <p>Name</p>
                    <p>Contact person</p>
                    <p>Phone No</p>
                    <p><button className='view-supplier-btn'>View</button></p>
                    <p><button className='delete-supplier-btn'>Delete</button></p>
                </div>
            </div>
        </div>
    </div>
  )
}

export default ViewSupplier
