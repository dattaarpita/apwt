import React, {useEffect} from "react";
import 'bootstrap/dist/css/bootstrap.min.css';
import {useState} from "react";
import axios from "axios";

import {Link} from "react-router-dom";

const Productlist = ()=>{
    const [products,setproducts]=useState([]);
    useEffect(()=>{

        axios.get('http://127.0.0.1:8000/api/product/all').then(resp=>{
            console.log(resp.data);
            setproducts(resp.data);
        }).catch(
            err=>{
                console.log(err);
            });

    },[]);

    return (
        <div className="container"> <br/>
            <h4>Data From API</h4> <br/>
            <h5>All Product Details</h5> <br/>
            <table className="table table-bordered">
                <tr className="table-primary">
                    <th className="table-primary">Product Name</th>
                    <th className="table-primary">Product Type</th>
                   
                    <th className="table-primary">Show</th>
                </tr>
                {
                    products.map((item, i) => (
                        <tr key={i}>
                            <td>{item.p_name}</td>
                            <td>{item.p_type}</td>


                            <td><Link to={"/show/"+item.id} className="btn btn-info">Product Details</Link></td>
                            <br/>
                        </tr>
                    ))
                }
            </table>
        </div>
    )


}

export default Productlist;