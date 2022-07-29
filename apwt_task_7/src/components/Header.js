import React from "react";
import 'bootstrap/dist/css/bootstrap.min.css';
import {Router,Route,Routes} from "react-router-dom";
import Homepage from "./Homepage";
import Productlist from "./Productlist";
import Navbar from "./Navbar";
import axios from "axios";
import Product from "./Product";
import Contactpage from "./Contactpage";

function Header()
{
    return (
        <div className="container">

          <Navbar/>
          <Routes>
              <Route index element={<Homepage name="Arpita Datta" university="AIUB" semester="9th" framework="Advance Web technology" />} />
              <Route path="/homepage" element={<Homepage name="Arpita Datta" university="AIUB" semester="9th" framework="Advance Web technology"/>}/>
              <Route path="/contact" element={<Contactpage/>} />
              <Route path="/Productlist" element={<Productlist/>} />
              <Route path="/show/:id" element={<Product/>}></Route>
          </Routes>





        </div>



    )

}
export default Header;
