import React from "react";
import 'bootstrap/dist/css/bootstrap.min.css';
import {Link} from "react-router-dom";

function Navbar()
{
    return(
      <div className="container">

          <div className="btn-group">
              <Link to="/homepage" className="btn btn-outline-info">
                  Home Page

              </Link>
              <Link to="/contact" className="btn btn-outline-info">
                  Contact

              </Link>
              <Link to="/Productlist" className="btn btn-outline-info">
                  Product list

              </Link>
          </div>
      </div>

    )
}
export default Navbar;