import React, {useState} from "react";
import 'bootstrap/dist/css/bootstrap.min.css';
import {useParams} from "react-router-dom";
import {useEffect} from "react";
import axios from "axios";

const Product = ()=>{

    const {id}=useParams();
    const [product,setProduct]=useState([]);

    useEffect(()=>{

        axios.get('http://127.0.0.1:8000/api/product/'+id).then(resp=>{
            console.log(resp.data);
            setProduct(resp.data);
        }).catch(
            err=>{
                console.log(err);
            });

    },[]);

    return (

        <div className="container">

            <br/>
            <h4>Product Details of ID {product.id}</h4>
            <br/>

            <h5>Product Name : {product.p_name}</h5>
            <h5>Product Type: {product.p_type}</h5>
            <h5>Product Quantity : {product.p_quantity}</h5>
            <h5>Product Price : {product.p_price}</h5>



        </div>

    )

}

export default Product;