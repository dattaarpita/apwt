import React from "react";
import 'bootstrap/dist/css/bootstrap.css';
import {bindReporter} from "web-vitals/dist/modules/lib/bindReporter";

function Footer(props){

    return(


        <div className="container border-danger position-absolute bottom-0 text-center">

            <h4>Copyright    &#169; {props.name} </h4>
        </div>
    )

}

export default Footer;