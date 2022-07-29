import React from "react";


import 'bootstrap/dist/css/bootstrap.min.css';

function Homepage(props){
    return (
        <div className="container">
            <br/>
            <h4>This is the homepage for API Data Testing for product selling</h4>
            <p>I am {props.name}. I am currently studying in {props.university}. I am in {props.semester} semester. I am doing {props.framework} course.</p> <br/>
        </div>
    )
}
export default Homepage;

